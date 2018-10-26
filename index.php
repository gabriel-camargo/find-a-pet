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

	$logado = Usuario::verifyLogin();
	if ($logado) {
		header('Location: /find-a-pet/');
		exit;
	}

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

	$logado = Usuario::verifyLogin();
	if ($logado) {
		header('Location: /find-a-pet/');
		exit;
	}

	$page = new Page();

	$page->setTpl("pages/header-deslogado");
  $page->setTpl("cadastro");
  $page->setTpl("pages/footer");
});

// ROTA DA PAGINA DE CADASTRO
$app->post('/cadastro/', function() {

	// RECUPERA OS VALORES DO FORMULARIO
  $nome = trim(isset($_POST['nome']) ? $_POST['nome'] : null);
  $email = trim(isset($_POST['email']) ? $_POST['email'] : null);
  $senha = trim(isset($_POST['senha']) ? $_POST['senha'] : null);

	Usuario::inserir($nome, $email, $senha);

	header("Location: /find-a-pet/");
	exit;
});

//ROTA PARA FAZER O LOGOUT DO USUÁRIO
$app->get("/logout/", function(){
	// deleta as variaveis de sessão, dessa maneira deslogando o usuário
	unset($_SESSION['login']);

	header('Location: /find-a-pet/login');
	exit;
});

$app->get('/', function(){
	$page = new Page();

	$logado = Usuario::verifyLogin();
	if (!$logado) {
		header('Location: /find-a-pet/login');
		exit;
	}

	$usuario = new Usuario();
	$usuario->loadById($_SESSION['login']['usu_id']);

	$page->setTpl("pages/header");

  $page->setTpl("publicacoes",array(
		"nome" => $usuario->getNomeUsuario()
	));

  $page->setTpl("pages/footer");
});

$app->run();



 ?>
