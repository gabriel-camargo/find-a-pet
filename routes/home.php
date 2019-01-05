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

	$page->setTpl("home",array(
		"nome" => $usuario->get_usu_nome()
	));
});