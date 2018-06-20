<?php
  // session_start();
  require_once(".." . DIRECTORY_SEPARATOR ."config". DIRECTORY_SEPARATOR . "config.php");
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
         <h3>Configurações de Senha</h3>

         <form class="" action="../func/update-senha.php" method="post">

           <div class="form-group row">
               <label for="inputSenhaAtual" class="col-sm-2 col-form-label">Senha Atual: </label>
               <div class="col-sm-10">
                 <input value="" name="senhaAtual" type="password" id="inputSenhaAtual" class="cadastro form-control" placeholder="**********" required autofocus>
               </div>
           </div>

           <div class="form-group row">
               <label for="inputSenhaNova" class="col-sm-2 col-form-label">Nova Senha: </label>
               <div class="col-sm-10">
                 <input value="" name="senhaNova" type="password" id="inputSenhaNova" class="cadastro form-control" placeholder="**********" required>
               </div>
           </div>

           <div class="form-group row">
               <label for="inputSenhaNovaConfirm" class="col-sm-2 col-form-label">Confirmar Senha: </label>
               <div class="col-sm-10">
                 <input value="" name="senhaNovaConfirm" type="password" id="inputSenhaNovaConfirm" class="cadastro form-control" placeholder="**********" required>
               </div>
           </div>
           <button class="btn btn-lg btn-primary btn-block cadastro-btn" type="submit" > Alterar Senha </button>
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
