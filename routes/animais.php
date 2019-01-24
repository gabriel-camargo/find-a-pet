<?php

use \FindAPet\Page;
use \FindAPet\Model\Usuario;
use \FindAPet\Model\Animal;
use \FindAPet\Model\Especie;
use \FindAPet\Helper\MensagemHelper;

$app->get('/animais/', function(){	

	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$page = new Page();

	$feedbackSuccess = MensagemHelper::getMensagem();

	$animais = Animal::listByUser($usuario->get_usu_id());

  	$page->setTpl("animais",array(
		"nome" => $usuario->get_usu_nome(),
		"feedback_success" => $feedbackSuccess,
		"animais" =>$animais
	));

});

$app->get("/animais/create/", function(){
    Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$especies = Especie::listAll();
	$faixaEtaria = Animal::FAIXA_ETARIA;
	$porte = Animal::PORTE;
	$status = Animal::STATUS_CADASTRO;

	$page = new Page();

  	$page->setTpl("animais-create",array(
		"nome" => $usuario->get_usu_nome(),
		"especies" => $especies,
		"faixa_etaria" => $faixaEtaria,
		"porte" => $porte,
		"status" => $status
	));
});

$app->post("/animais/create/", function(){

	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$_POST["animal"]["usu_id"] = $usuario->get_usu_id();

	$return = Animal::inserir($_POST['animal']);

	if(!$return['cadastrou']) throw new \Exception('Campos obrigatórios vazios!');	

	if($_POST['image'] != NULL)Animal::savePhoto($_POST["image"], $return['lastId']);

});

$app->get("/animais/:id", function($id){

	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$animal = Animal::searchById($id);

	$especies = Especie::listAll();
	$faixaEtaria = Animal::FAIXA_ETARIA;
	$porte = Animal::PORTE;
	$status = Animal::STATUS_CADASTRO;

	// VERIFICAR SE IMAGEM EXISTE
	$foto = (file_exists(
			$_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR .
			"animal" . DIRECTORY_SEPARATOR .  $id . ".png"
		)) ? $animal['ani_id'] : "default" ;

	$page = new Page();

	$page->setTpl("animais-update", array(
		"nome" => $usuario->get_usu_nome(),
		"animal" => $animal,
		"foto" => $foto,
		"especies" => $especies,
		"faixa_etaria" => $faixaEtaria,
		"porte" => $porte,
		"status" => $status
	));
});