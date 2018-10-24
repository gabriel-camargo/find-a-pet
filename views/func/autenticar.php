<?php

  require_once('..' . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php");

  //resgata as variáveis do formulario
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

  $usuarios = Usuario::autenticar($email, $senha);

  var_dump($usuarios);

  //se nao for encontrado nenhum usuario
  if (count($usuarios) >= 1) {
    $user = $usuarios[0];

    $_SESSION['login']['logged_in'] = true;
    $_SESSION['login']['usu_id'] = isset($user['usu_id']) ? $user['usu_id'] : '';

    header('Location: ../templates/index.php');exit;
  }
  header('Location: ../templates/login.php');exit;
 ?>
