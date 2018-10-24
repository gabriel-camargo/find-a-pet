<?php
  require_once(".." .  DIRECTORY_SEPARATOR . "config". DIRECTORY_SEPARATOR . "config.php");
  $file = $_FILES["fileUpload"];
  $animal = new Animal();
  $animal->loadById($_SESSION['login']['ani_id']);

  if($file["error"]){

    throw new Exception("Error: ". $file["error"]);

  }
  $id_string = (string) $_SESSION['login']['ani_id'];

  $dirAnimal = ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "animal";
  if(!is_dir($dirAnimal)){
    mkdir($dirAnimal);
  }

  $dirUploads = $dirAnimal . DIRECTORY_SEPARATOR. $id_string;

  if (!is_dir($dirUploads)){

    mkdir($dirUploads);

  }

  if(move_uploaded_file($file["tmp_name"], $dirUploads . DIRECTORY_SEPARATOR . $file["name"])){

    echo "upload realizado com sucesso!";
    $animal->updateFoto($file["name"]);
    header("Location: ../templates/animal-expansao.php");

  } else{
    throw new Exception("Não foi possivel realizar o upload do arquivo");
  }
?>
