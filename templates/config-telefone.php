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
         <h3>Configurações de Telefone</h3>

         <form class="" action="../func/update-telefone.php" method="post">
           <span>Telefone atual: <?php echo $user->getTelefoneUsuario(); ?></span>

           <div class="form-group row">
               <label for="inputTelefone" class="col-sm-2 col-form-label">Telefone: </label>
               <div class="col-sm-10">
                 <input value="" name="telefone" type="text" id="inputTelefone" class="cadastro form-control" placeholder="Ex: (12) 3600-0000" required autofocus>
               </div>
           </div>
           <button class="btn btn-lg btn-primary btn-block cadastro-btn" type="submit" > Alterar Telefone </button>
         </form>

         <br><br><br><br>

         <form class="" action="../func/update-celular.php" method="post">
           <span>Celular atual: <?php echo $user->getCelularUsuario(); ?></span>

           <div class="form-group row">
               <label for="inputCelular" class="col-sm-2 col-form-label">Celular: </label>
               <div class="col-sm-10">
                 <input value="" name="celular" type="text" id="inputCelular" class="cadastro form-control" placeholder="Ex: (12) 99999-9999" required>
               </div>
           </div>
           <button class="btn btn-lg btn-primary btn-block cadastro-btn" type="submit" > Alterar Celular </button>
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
