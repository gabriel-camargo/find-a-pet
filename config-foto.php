<?php
  // session_start();
  require_once("config". DIRECTORY_SEPARATOR . "config.php");
  require_once("check.php");

  $user = new Usuario();
  $user->loadById($_SESSION['login']['usu_id']);
 ?>

 <!DOCTYPE html>
 <html lang="pt-br" dir="ltr">
   <head>
     <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'header.php');
      ?>
      <style media="screen">
      .config-img{
        display: block;
        margin-left: auto;
        margin-right: auto;
      }

      </style>
   </head>
   <body>
     <?php
       require_once('pages' . DIRECTORY_SEPARATOR . 'navbar.php');
      ?>

      <div class="row" id="body-row">

        <?php require_once('pages' . DIRECTORY_SEPARATOR . 'sidebar-config.php') ?>

     <!-- INICIO DA DIV DE CONTEUDO -->
     <div class="col py-3">

       <div class="container">
         <h3>Configurações de Foto</h3>

         <img class="publicacao-foto config-img" id="imagem-perfil" src="img/logo.png" alt="your image" width="200" height="200"/>

         <br>
         <form class="" action="update-imagem.php" method="post" enctype="multipart/form-data">
         <div class="custom-file">
           <input name ="fileUpload" type="file" class="custom-file-input" id="inputFoto">
           <label class="custom-file-label" for="inputFoto">Escolha uma imagem...</label>
           <div class="invalid-feedback">Example invalid custom file feedback</div>
         </div>

         <br><br>

         <button class="btn btn-lg btn-primary btn-block cadastro-btn" type="submit" >Alterar imagem de perfil</button>
     <!-- FIM DO INPUT DA IMAGEM -->
        </form>

       </div>

     </div>
     <!-- FIM DA DIV DE CONTEUDO-->

 </div>
 <!-- body-row END -->

      <?php
        require_once('pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
       ?>
         <script src="js/carregar-imagem.js" type="text/javascript"></script>
   </body>
 </html>
