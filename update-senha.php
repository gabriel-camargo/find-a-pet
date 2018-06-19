<?php

require_once("config" . DIRECTORY_SEPARATOR . "config.php");
$usuario = new Usuario();
$usuario->loadById($_SESSION['login']['usu_id']);

// RECUPERA OS VALORES DO FORMULARIO
$senha = isset($_POST['senhaNova']) ? $_POST['senhaNova'] : null;

$sql = new Sql();

$usuario->updateSenha($senha);

header("Location: config-senha.php");
 ?>
