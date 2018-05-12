<?php
  require_once("config" . DIRECTORY_SEPARATOR . "config.php");


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

  if ($nome != null) {
    if ($senha === $senhaConfirm) {
      $sql = new Sql();

      $usuario = new Usuario();

      $usuario->setNomeUsuario($nome);
      $usuario->setApelidoUsuario($apelido);
      $usuario->setCpfUsuario($cpf);
      $usuario->setCnpjUsuario($cnpj);
      $usuario->setSexoUsuario($sexo);
      $usuario->setEmailUsuario($email);
      $usuario->setSenhaUsuario($senha);
      $usuario->setTelefoneUsuario($telefone);
      $usuario->setCelularUsuario($celular);
      $usuario->setCepUsuario($cep);
      $usuario->setLogradouroUsuario($logradouro);
      $usuario->setNumeroEnderecoUsuario($numero);
      $usuario->setBairroUsuario($bairro);
      $usuario->setComplementoUsuario($complemento);
      $usuario->setUfUsuario($estado);
      $usuario->setCidadeUsuario($cidade);

      $usuario->insert();

      header('Location: login.php');

    }
  }

 ?>
