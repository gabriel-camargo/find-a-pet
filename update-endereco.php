<?php

require_once("config" . DIRECTORY_SEPARATOR . "config.php");
$usuario = new Usuario();
$usuario->loadById($_SESSION['login']['usu_id']);

// RECUPERA OS VALORES DO FORMULARIO
$cep = isset($_POST['cep']) ? $_POST['cep'] : null;
$logradouro = isset($_POST['logradouro']) ? $_POST['logradouro'] : null;
$numero = isset($_POST['numero']) ? $_POST['numero'] : null;
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
$complemento = isset($_POST['complemento']) ? $_POST['complemento'] : null;

$sql = new Sql();

$usuario->updateEndereco($cep, $logradouro, $numero, $bairro, $complemento);

header("Location: config-endereco.php");
 ?>
