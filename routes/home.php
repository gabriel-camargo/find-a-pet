<?php

use \FindAPet\Page;
use \FindAPet\Model\Usuario;
use \FindAPet\Model\Animal;

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

	$page = new Page();

	$page->setTpl("pages/header",array(
		"nome" => $usuario->get_usu_nome()
	));

  $page->setTpl("home");
  $page->setTpl("pages/footer");
});

$app->get('/animais/', function(){
	$page = new Page();

	$logado = Usuario::verifyLogin();
	if (!$logado) {
		header('Location: /find-a-pet/login');
		exit;
	}

	$usuario = new Usuario();
	$usuario->loadById($_SESSION['login']['usu_id']);

	$page->setTpl("pages/header",array(
		"nome" => $usuario->getNomeUsuario()
	));

  	$page->setTpl("animais");

  	$page->setTpl("pages/footer");
});