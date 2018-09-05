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
         <h3>Configurações de Email</h3>

         <form class="" action="../func/update-email.php" method="post">
           <span>Email atual: <?= $user->getEmailUsuario(); ?></span>

           <div class="form-group row">
               <label for="inputEmail" class="col-sm-2 col-form-label">Email: </label>
               <div class="col-sm-10">
                 <input value="" name="email" type="text" id="inputEmail"
                  class="cadastro form-control" placeholder="Ex: fulano@email.com" required autofocus>
               </div>
           </div>
           <button class="btn btn-lg btn-primary btn-block cadastro-btn" type="submit" >
              Alterar Email
            </button>
         </form>

       </div>

     </div>
     <!-- FIM DA DIV DE CONTEUDO-->

 </div>
 <!-- body-row END -->

      <?php
        require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
       ?>
   </body>
 </html>
