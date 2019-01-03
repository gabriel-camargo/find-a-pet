<?php

use \FindAPet\Page;
use \FindAPet\Model\Usuario;
use \FindAPet\Helper\MensagemHelper;

// ROTA DA PAGINA DE LOGIN
$app->get('/login/', function() {

	Usuario::verifyLogout();

	$erro = MensagemHelper::getMensagemErro();

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

	$page = new Page();
  	$page->setTpl("cadastro");
});

// ROTA DA PAGINA DE CADASTRO
$app->post('/cadastro/', function() {

	// RECUPERA OS VALORES DO FORMULARIO
  	$nome = trim(isset($_POST['nome']) ? $_POST['nome'] : null);
  	$email = trim(isset($_POST['email']) ? $_POST['email'] : null);
	$senha = trim(isset($_POST['senha']) ? $_POST['senha'] : null);
	$senhaConfirm = trim(isset($_POST['senhaConfirm']) ? $_POST['senhaConfirm'] : null);

	Usuario::inserir($nome, $email, $senha, $senhaConfirm);

	header("Location: /home/");
	exit;
});