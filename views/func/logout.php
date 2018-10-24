<?php

require_once(".." . DIRECTORY_SEPARATOR . "config". DIRECTORY_SEPARATOR . "config.php");

// deleta as variaveis de sessão, dessa maneira deslogando o usuário
unset($_SESSION['login']);

// retorna para a login.php
header('Location: ../templates/login.php');

 ?>
