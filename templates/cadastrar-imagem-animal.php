<?php
  // session_start();
  require_once(".." . DIRECTORY_SEPARATOR . "config". DIRECTORY_SEPARATOR . "config.php");
  require_once(".." . DIRECTORY_SEPARATOR . "func" . DIRECTORY_SEPARATOR . "check.php");

  $user = new Usuario();
  $user->loadById($_SESSION['login']['usu_id']);

  $animal = new Animal();
  $animal->loadById($_SESSION['login']['ani_id']);
 ?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <?php
      require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'header.php');
     ?>
  </head>
  <body>
    <?php
      require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'navbar.php');
     ?>
      <br>
      <div class="container">

          <!-- INPUT DA IMAGEM -->
              <img id="imagem-perfil" src="../img/logo.png" alt="your image" width="200" height="200"/>

              <br><br>
              <form class="" action="../func/update-imagem-animal.php"
              method="post" enctype="multipart/form-data">
              <div class="custom-file">
                <input name ="fileUpload" type="file" class="custom-file-input" id="inputFoto">
                <label class="custom-file-label" for="inputFoto">Escolha uma imagem...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>

              <br><br>

              <button class="btn btn-lg btn-primary btn-block cadastro-btn" type="submit" >Cadastrar</button>
          <!-- FIM DO INPUT DA IMAGEM -->
        </form>
      </div>


     <?php
       require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
      ?>
      <script src="../js/carregar-imagem.js" type="text/javascript"></script>
  </body>
</html>
