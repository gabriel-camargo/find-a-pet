<?php
  require_once("config". DIRECTORY_SEPARATOR . "config.php");

  if (!isLoggedIn())
  {
    header('Location: login.php');
  }

 ?>
