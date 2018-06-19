<?php

require_once("config" . DIRECTORY_SEPARATOR . "config.php");
$usuario = new Usuario();
$usuario->loadById($_SESSION['login']['usu_id']);

// RECUPERA OS VALORES DO FORMULARIO
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;

$sql = new Sql();

$usuario->updateTelefone($telefone);

header("Location: config-telefone.php");
 ?>
