<?php
  require_once(".." .  DIRECTORY_SEPARATOR . "config". DIRECTORY_SEPARATOR . "config.php");
  require_once("check.php");

  $user = new Usuario();
  $user->loadById($_SESSION['login']['usu_id']);

  echo $user->getIdUsuario();
  $user->deleteAnimais();
  $user->delete();


  // header('Location: logout.php');
 ?>
