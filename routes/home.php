<?php

use \FindAPet\Page;
use \FindAPet\Model\Usuario;
use \FindAPet\Model\Animal;
use \FindAPet\Model\Especie;
use \FindAPet\Model\Status;
use \FindAPet\Model\Porte;
use \FindAPet\Model\FaixaEtaria;
use \FindAPet\Repositories\AnimalsRepository;

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

	$especies = Especie::all();
	$status = Status::find("cad");
	$porte = Porte::all();
	$faixaEtaria = FaixaEtaria::all();

	//listar animais que não são do usuário, e que estão em adoção ou perdidos
	$animalsRepository = new AnimalsRepository();
	$animais = $animalsRepository->list($usuario->get_usu_id());	

	$page = new Page();

	$page->setTpl("home",array(
		"nome" => $usuario->get_usu_nome(),
		"especies" => $especies,
		"status" => $status,
		"porte" => $porte,
		"faixaEtaria" => $faixaEtaria,
		"animais" => $animais
	));
});