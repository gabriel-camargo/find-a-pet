<?php

  session_start();
  $_SESSION['lang'] = 'pt_br';

  spl_autoload_register(function($class_name){
    $filename = "config". DIRECTORY_SEPARATOR .  "class". DIRECTORY_SEPARATOR .$class_name.".php";

    if(file_exists($filename)){
      require_once($filename);
    }

  });

  function isLoggedIn()
  {
      if (!isset($_SESSION['login']['logged_in']) || $_SESSION['login']['logged_in'] !== true)
      {
          return false;
      }

      return true;
  }

 ?>
