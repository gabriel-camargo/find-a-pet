<?php
require_once("config" . DIRECTORY_SEPARATOR . "config.php");
  $file = $_FILES["fileUpload"];
  $animal = new Animal();
  $animal->loadById($_SESSION['login']['ani_id']);

  if($file["error"]){

    throw new Exception("Error: ". $file["error"]);

  }
  $id_string = (string) $_SESSION['login']['ani_id'];

  echo $id_string;

  $dirUploads = "img" . DIRECTORY_SEPARATOR . "animal" . DIRECTORY_SEPARATOR. $id_string;

  echo $dirUploads;

  if (!is_dir($dirUploads)){

    mkdir($dirUploads);

  }

  if(move_uploaded_file($file["tmp_name"], $dirUploads . DIRECTORY_SEPARATOR . $file["name"])){

    echo "upload realizado com sucesso!";
    $animal->updateFoto($file["name"]);
    header("Location: animal-expansao.php");

  } else{
    throw new Exception("N�o foi possivel realizar o upload do arquivo");
  }
?>
