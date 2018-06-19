<?php

require_once("config" . DIRECTORY_SEPARATOR . "config.php");
$usuario = new Usuario();
$usuario->loadById($_SESSION['login']['usu_id']);

// RECUPERA OS VALORES DO FORMULARIO
$email = isset($_POST['email']) ? $_POST['email'] : null;

$sql = new Sql();

$usuario->updateEmail($email);

header("Location: config-email.php");
 ?>
