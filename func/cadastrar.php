<?php
  require_once(".." . DIRECTORY_SEPARATOR . "config". DIRECTORY_SEPARATOR . "config.php");

  // RECUPERA OS VALORES DO FORMULARIO
  $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
  $email = isset($_POST['email']) ? $_POST['email'] : null;
  $senha = isset($_POST['senha']) ? $_POST['senha'] : null;

  // SE OS CAMPOS ESTIVEREM COM ALGUM VALOR
  if ($nome != null) {
      $sql = new Sql();

      $usuario = new Usuario();

      $usuario->setNomeUsuario($nome);
      $usuario->setEmailUsuario($email);
      $usuario->setSenhaUsuario($senha);

      $usuario->insert();

      $usuario->autentica();

      header('Location: ../templates/cadastro-imagem.php');
  }
 ?>
