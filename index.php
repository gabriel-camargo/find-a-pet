<?php

// session_start();
require_once("vendor/autoload.php");
require_once("class" . DIRECTORY_SEPARATOR . "Page.php");

use \Slim\Slim;
use \FindAPet\Page;

$app = new Slim();

$app->config('debug', true);

// ROTA DA PAGINA DE LOGIN
$app->get('/login/', function() {
	$page = new Page();
	$page->setTpl("pages/header");
  $page->setTpl("login");
  $page->setTpl("pages/footer");
});

$app->run();



 ?>
