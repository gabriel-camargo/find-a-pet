<?php

use \FindAPet\Page;
use \FindAPet\Model\Usuario;
use \FindAPet\Model\Animal;
use \FindAPet\Model\Adocao;
use \FindAPet\Model\Especie;
use \FindAPet\Model\Status;
use \FindAPet\Model\Porte;
use \FindAPet\Model\FaixaEtaria;
use \FindAPet\Repositories\AnimalsRepository;
use \FindAPet\Repositories\AdocoesRepository;

$app->get("/", function() use($app){
	$app->redirect("/home/");
});

//ROTA PARA FAZER O LOGOUT DO USUÁRIO
$app->get("/logout/", function(){
	Usuario::logout();

	header("Location: /login");
	exit;
});

$app->get('/home/', function(){

	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$adocoesRepository = new AdocoesRepository();
	$adocoesRecentes = $adocoesRepository->recentRequests($usuario->get_usu_id());

	//VERIFICAR SE IMAGEM EXISTE
	$fotoUsuario = (file_exists(
        $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . 
        "res" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR .
        "perfil" . DIRECTORY_SEPARATOR .  $usuario->get_usu_id() . ".png"
    )) ?"perfil/". $usuario->get_usu_id() . '.png' : "default.png" ;

	$especies = Especie::all();
	$status = Status::find("cad");
	$porte = Porte::all();
	$faixaEtaria = FaixaEtaria::all();

	$page = new Page();

	$page->setTpl("home",array(
		"nome" => $usuario->get_usu_nome(),
		"especies" => $especies,
		"status" => $status,
		"porte" => $porte,
		"faixaEtaria" => $faixaEtaria,
		"uf" => utf8_encode($usuario->get_usu_uf()),
		"cidade" => utf8_encode($usuario->get_usu_cidade()),
		"fotoUsuario" => $fotoUsuario,
		"adocoesRecentes" => $adocoesRecentes
	));
});

$app->post('/home/search', function(){
	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$animalsRepository = new AnimalsRepository();

	$animaisPendentes = $animalsRepository->pendentAnimals($usuario->get_usu_id());
	$animaisPendentesString = (count($animaisPendentes) > 0)? implode(",", $animaisPendentes):'';

	$animais = $animalsRepository->list(
		$usuario->get_usu_id(),
		utf8_decode($_POST['filter']),
		$_POST['page'],
		$_POST['per_page'],
		$animaisPendentesString 
	);	

	echo json_encode($animais);
});

$app->post('/home/check-total', function(){
	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$animalsRepository = new AnimalsRepository();
	$animaisPendentes = $animalsRepository->pendentAnimals($usuario->get_usu_id());
	$animaisPendentesString = (count($animaisPendentes) > 0)? implode(",", $animaisPendentes):'';

	$count = (array) $animalsRepository->checkTotal($usuario->get_usu_id(), utf8_decode($_POST['filter']), $animaisPendentesString );	

	echo json_encode($count[0]);
});

$app->post('/home/pedir-adocao', function(){
	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$adocao = new Adocao();

	$adocao->set_sta_id($_POST['sta_id']);
	$adocao->set_ado_texto($_POST['text']);
	$adocao->set_usu_id($usuario->get_usu_id());
	$adocao->set_ani_id($_POST['ani_id']);

	$adocao->save();

	echo json_encode(array(
		"msg" => "cadastrou",
	));
});