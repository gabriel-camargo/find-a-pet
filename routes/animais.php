<?php

use \FindAPet\Page;
use \FindAPet\Model\Usuario;
use \FindAPet\Model\Animal;
use \FindAPet\Model\Especie;

$app->get('/animais/', function(){	

	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$page = new Page();

  	$page->setTpl("animais",array(
		"nome" => $usuario->get_usu_nome()
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

	$_POST["usu_id"] = $usuario->get_usu_id();
	
	$cadastrou = Animal::inserir($_POST);

	header("Location: /animais/");exit;
});