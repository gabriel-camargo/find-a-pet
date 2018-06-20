<?php

require_once(".." .  DIRECTORY_SEPARATOR . "config". DIRECTORY_SEPARATOR . "config.php");
$usuario = new Usuario();
$usuario->loadById($_SESSION['login']['usu_id']);

// RECUPERA OS VALORES DO FORMULARIO
$celular = isset($_POST['celular']) ? $_POST['celular'] : null;

$sql = new Sql();

$usuario->updateCelular($celular);

header("Location: ../templates/config-telefone.php");
 ?>
