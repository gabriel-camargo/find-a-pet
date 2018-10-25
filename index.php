<?php

session_start();
require_once("vendor/autoload.php");
require_once("class" . DIRECTORY_SEPARATOR . "Page.php");
require_once("class" . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "Usuario.php");
require_once("class" . DIRECTORY_SEPARATOR . "DB" . DIRECTORY_SEPARATOR . "Sql.php");

use \Slim\Slim;
use \FindAPet\Page;
use \FindAPet\Model\Usuario;

$app = new Slim();

$app->config('debug', true);

// ROTA DA PAGINA DE LOGIN
$app->get('/login/', function() {
	$page = new Page();
	$page->setTpl("pages/header-deslogado");
  $page->setTpl("login");
  $page->setTpl("pages/footer");
});

// POST DA TELA DE LOGIN PARA AUTENTICAR O USUÁRIO
$app->post('/login/', function() {
	$email = isset($_POST['email']) ? $_POST['email'] : '';
  $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

	Usuario::autenticar($email, $senha);

	header("Location: /find-a-pet/");
	exit;
});

// ROTA DA PAGINA DE CADASTRO
$app->get('/cadastro/', function() {
	$page = new Page();

	$page->setTpl("pages/header-deslogado");
  $page->setTpl("cadastro");
  $page->setTpl("pages/footer");
});

$app->get('/', function(){
	$page = new Page();

	Usuario::verifyLogin();

	$page->setTpl("pages/header-deslogado");
  $page->setTpl("publicacoes");
  $page->setTpl("pages/footer");
});

$app->run();



 ?>
