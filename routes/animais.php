<?php

use \FindAPet\Page;
use \FindAPet\Model\Usuario;
use \FindAPet\Model\Animal;
use \FindAPet\Model\Especie;
use \FindAPet\Model\FaixaEtaria;
use \FindAPet\Model\Status;
use \FindAPet\Model\Porte;
use \FindAPet\Helper\MensagemHelper;
use \FindAPet\Helper\ImageHelper;
use \FindAPet\Repositories\AnimalsRepository;

$app->get('/animais/', function(){	

	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$page = new Page();

	$feedbackSuccess = MensagemHelper::getMensagem();
	
	$animalsRepository = new AnimalsRepository();

	$animais = $animalsRepository->listByUser($usuario->get_usu_id());

  	$page->setTpl("animais",array(
		"nome" => $usuario->get_usu_nome(),
		"feedback_success" => $feedbackSuccess,
		"animais" =>$animais
	));

});

$app->get("/animais/create/", function(){
    Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$especies = Especie::all();
	$faixaEtaria = FaixaEtaria::all();
	$porte = Porte::all();
	$status = Status::find("cad");

	$page = new Page();

  	$page->setTpl("animais-create",array(
		"nome" => $usuario->get_usu_nome(),
		"especies" => $especies,
		"faixa_etaria" => $faixaEtaria,
		"porte" => $porte,
		"status" => $status
	));
});

$app->post("/animais/create/", function() {

	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$_POST["animal"]["usu_id"] = $usuario->get_usu_id();	

	$animal = new Animal();
    $animal->setData($_POST['animal']);

	$return = $animal->save();

	if(!$return['cadastrou']) throw new \Exception('Campos obrigatórios vazios!');	

	if($_POST['image'] != NULL) ImageHelper::savePhoto($_POST["image"], $return['lastId'], "animal");

});

$app->get("/animais/:id", function($id){

	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$animal = new Animal();
	$animal->find($id);

	$error = MensagemHelper::getMensagem();

	$especies = Especie::all();
	$faixaEtaria = FaixaEtaria::all();
	$porte = Porte::all();
	$status = Status::find("cad");

	// VERIFICAR SE IMAGEM EXISTE
	$foto = (file_exists(
			$_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR .
			"animal" . DIRECTORY_SEPARATOR .  $id . ".png"
		)) ? $animal->get_ani_id() : "default" ;

	$page = new Page();

	$page->setTpl("animais-update", array(
		"nome" => $usuario->get_usu_nome(),
		"animal" => $animal,
		"id" =>$animal->get_ani_id(),
		"foto" => $foto,
		"especies" => $especies,
		"faixa_etaria" => $faixaEtaria,
		"porte" => $porte,
		"status" => $status,
		"error" => $error
	));
});

$app->post("/animais/:id", function($id){

	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$animal = new Animal();
	$animal->setData($_POST);

	$return = $animal->save();

	if(!$return['cadastrou']) {
		MensagemHelper::setMensagem("Preencha os campos obrigatórios!");
		header("Location: /animais/$id");
		exit;
	}

	header("Location: /animais");
	exit;
});

$app->post("/animais/savePhoto/:id", function($id){

	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	ImageHelper::savePhoto($_POST["image"], $id, "animal");

	MensagemHelper::setMensagem("Foto de animal atualizada com sucesso!");

	header("Location: /animais");
	exit;

});

$app->get("/animais/delete/:id", function($id){

	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	Animal::delete($id);

	MensagemHelper::setMensagem("Animal excluído com sucesso!");	
});