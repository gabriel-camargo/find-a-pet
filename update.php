<?php
  require_once("config" . DIRECTORY_SEPARATOR . "config.php");
  $usuario = new Usuario();
  $usuario->loadById($_SESSION['login']['usu_id']);

  // RECUPERA OS VALORES DO FORMULARIO
  $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
  $apelido = isset($_POST['apelido']) ? $_POST['apelido'] : null;
  $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
  $cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : null;
  $sexo = isset($_POST['sexoRadio']) ? $_POST['sexoRadio'] : null;
  $email = isset($_POST['email']) ? $_POST['email'] : null;
  $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
  $senhaConfirm = isset($_POST['senhaConfirm']) ? $_POST['senhaConfirm'] : null;
  $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
  $celular = isset($_POST['celular']) ? $_POST['celular'] : null;
  $cep = isset($_POST['cep']) ? $_POST['cep'] : null;
  $logradouro = isset($_POST['logradouro']) ? $_POST['logradouro'] : null;
  $numero = isset($_POST['numero']) ? $_POST['numero'] : null;
  $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
  $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : null;
  $estado = isset($_POST['estado']) ? $_POST['estado'] : null;
  $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;

  $sql = new Sql();

  $usuario->update('',
    $cpf,
    $cnpj,
    $nome,
    $apelido,
    $sexo,
    $email,
    $senha,
    $telefone,
    $celular,
    $cep,
    $logradouro,
    $num_endereco,
    $complemento,
    $bairro,
    $cidade,
    $estado);

  header('Location: index.php');


 ?>