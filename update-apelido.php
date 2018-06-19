<?php

require_once("config" . DIRECTORY_SEPARATOR . "config.php");
$usuario = new Usuario();
$usuario->loadById($_SESSION['login']['usu_id']);

// RECUPERA OS VALORES DO FORMULARIO
$apelido = isset($_POST['apelido']) ? $_POST['apelido'] : null;

$sql = new Sql();

$usuario->updateApelido($apelido);

header("Location: config-nome.php");
 ?>
