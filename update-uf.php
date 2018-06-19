<?php

require_once("config" . DIRECTORY_SEPARATOR . "config.php");
$usuario = new Usuario();
$usuario->loadById($_SESSION['login']['usu_id']);

// RECUPERA OS VALORES DO FORMULARIO
$uf = isset($_POST['estado']) ? $_POST['estado'] : null;
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;

$sql = new Sql();

$usuario->updateUf($uf, $cidade);

header("Location: config-endereco.php");
 ?>
