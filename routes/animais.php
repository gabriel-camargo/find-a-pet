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

  	$page->setTpl("animais",array(
		"nome" => $usuario->get_usu_nome(),
		"feedback_success" => $feedbackSuccess
	));

});

$app->get("/animais/create/", function(){
    Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$especies = Especie::listAll();
	$faixaEtaria = Animal::FAIXA_ETARIA;
	$porte = Animal::PORTE;
	$status = Animal::STATUS_CADASTRO;

	$erro = MensagemHelper::getMensagem();
	$oldPost = Animal::getOldPost();

	$page = new Page();

  	$page->setTpl("animais-create",array(
		"nome" => $usuario->get_usu_nome(),
		"especies" => $especies,
		"faixa_etaria" => $faixaEtaria,
		"porte" => $porte,
		"status" => $status,
		"erro" => $erro,
		"old_post" => $oldPost
	));
});

$app->post("/animais/create/", function(){

	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$_POST["usu_id"] = $usuario->get_usu_id();
	
	$cadastrou = Animal::inserir($_POST);

	if(!$cadastrou){
		header("Location: /animais/create");exit;
	}

	header("Location: /animais/");exit;
});