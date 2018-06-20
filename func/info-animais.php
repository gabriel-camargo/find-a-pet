<?php
  require_once(".." .  DIRECTORY_SEPARATOR . "config". DIRECTORY_SEPARATOR . "config.php");

  // RECUPERA OS VALORES DO FORMULARIO
  $id = isset($_POST['id']) ? $_POST['id'] : null;

  $sql = new Sql();

  $_SESSION['login']['ani_id'] = $id;

  header('Location: ../templates/animal-expansao.php');

 ?>
