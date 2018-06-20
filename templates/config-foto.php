<?php
  // session_start();
  require_once(".." . DIRECTORY_SEPARATOR . "config". DIRECTORY_SEPARATOR . "config.php");
  require_once(".." . DIRECTORY_SEPARATOR . "func" . DIRECTORY_SEPARATOR . "check.php");

  $user = new Usuario();
  $user->loadById($_SESSION['login']['usu_id']);
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

      <div class="row" id="body-row">

        <?php require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'sidebar-config.php') ?>

     <!-- INICIO DA DIV DE CONTEUDO -->
     <div class="col py-3">

       <div class="container">
         <h3>Configurações de Foto</h3>

         <?php if ($user->getFotoUsuario() === "" || null === $user->getFotoUsuario()) {
           ?> <img id="imagem-perfil" src="#" alt="Escolha uma imagem" height="200" width="200"> <?php
         }else{
           ?><img id="imagem-perfil" class="config-img"src="<?php echo ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "perfil" . DIRECTORY_SEPARATOR . $user->getIdUsuario() . DIRECTORY_SEPARATOR . $user->getFotoUsuario(); ?>" alt="" height="200" width="200"><?php
         } ?>


         <br>
         <form class="" action="../func/update-imagem.php" method="post" enctype="multipart/form-data">
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
        require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
       ?>
         <script src="../js/carregar-imagem.js" type="text/javascript"></script>
   </body>
 </html>
