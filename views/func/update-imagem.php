<?php
  require_once(".." . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php");
  $file = $_FILES["fileUpload"];
  $usuario = new Usuario();
  $usuario->loadById($_SESSION['login']['usu_id']);

  if($file["error"]){

    throw new Exception("Error: ". $file["error"]);

  }
  $id_string = (string) $_SESSION['login']['usu_id'];

  $dirPerfil = ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "perfil";
  if(!is_dir($dirPerfil)){
    mkdir($dirUploads);
  }

  $dirUploads = ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "perfil" . DIRECTORY_SEPARATOR. $id_string;

  echo $dirUploads;

  if (!is_dir($dirUploads)){

    mkdir($dirUploads);

  }

  if(move_uploaded_file($file["tmp_name"], $dirUploads . DIRECTORY_SEPARATOR . $file["name"])){

    echo "upload realizado com sucesso!";
    $usuario->updateFoto($file["name"]);
    header("Location: ../templates/config-foto.php");

  } else{
    throw new Exception("Não foi possivel realizar o upload do arquivo");
  }
?>
