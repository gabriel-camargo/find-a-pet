<?php

use \FindAPet\Page;
use \FindAPet\Model\Usuario;
use \FindAPet\Helper\MensagemHelper;

// ROTA DA PAGINA DE LOGIN
$app->get('/login/', function() {

	Usuario::verifyLogout();

	$erro = MensagemHelper::getMensagem();

	$page = new Page();
  	$page->setTpl("login", array(
		"erro" => $erro
	));
	  
});

// POST DA TELA DE LOGIN PARA AUTENTICAR O USUÁRIO
$app->post('/login/', function() {
	$email = isset($_POST['email']) ? $_POST['email'] : '';
  	$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

	Usuario::autenticar($email, $senha);

	header("Location: /home/");
	exit;
});

// ROTA DA PAGINA DE CADASTRO
$app->get('/cadastro/', function() {

	Usuario::verifyLogout();

	$erro = MensagemHelper::getMensagem();

	$page = new Page();
  	$page->setTpl("cadastro", array(
		"erro" => $erro
	));
});

// ROTA DA PAGINA DE CADASTRO
$app->post('/cadastro/', function() {

	// FORÇA O USO DE USU_CIDADE
	$_POST['usu_cidade'] = (isset($_POST['usu_cidade'])) ? $_POST['usu_cidade'] : '';

	$usuario = new Usuario();
	$usuario->setData($_POST);
	
	$cadastrou = $usuario->save();

	if ($cadastrou) {
		header("Location: /home/");
		exit;
	} else {
		header("Location: /cadastro/");
		exit;
	}
	
});