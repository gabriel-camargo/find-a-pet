<?php

require_once(".." . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php");
$usuario = new Usuario();
$usuario->loadById($_SESSION['login']['usu_id']);

// RECUPERA OS VALORES DO FORMULARIO
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;

$sql = new Sql();

$usuario->updateNome($nome);

header("Location: ../templates/config-nome.php");
 ?>
