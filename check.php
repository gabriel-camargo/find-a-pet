<?php
  require_once("config". DIRECTORY_SEPARATOR . "config.php");

  //função de config.php, que verifica se a variavel $_SESSION[login][logged_in] existe
  //ou esta com o valor true
  if (!isLoggedIn())
  {
    header('Location: login.php');
  }

 ?>
