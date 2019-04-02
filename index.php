<?php

session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;

$app = new Slim();

$app->config('debug', true);

require_once("routes" . DIRECTORY_SEPARATOR . "login.php");
require_once("routes" . DIRECTORY_SEPARATOR . "home.php");
require_once("routes" . DIRECTORY_SEPARATOR . "animais.php");
require_once("routes" . DIRECTORY_SEPARATOR . "profile.php");

$app->run();