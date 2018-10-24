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
         <h3>Configurações de Nome</h3>

         <form class="" action="../func/update-nome.php" method="post">
           <span>Nome atual: <?= $user->getNomeUsuario(); ?></span>

           <div class="form-group row">
               <label for="inputNome" class="col-sm-2 col-form-label">Nome completo: </label>
               <div class="col-sm-10">
                 <input value="" name="nome" type="text" id="inputNome"
                 class="cadastro form-control" placeholder="Ex: Fulano da Silva" required autofocus>
               </div>
           </div>
           <button class="btn btn-lg btn-primary btn-block cadastro-btn" type="submit" >
              Alterar nome
            </button>
         </form>

         <br><br><br><br>

         <form class="" action="../func/update-apelido.php" method="post">
           <span>Nome de usuário atual: <?= $user->getApelidoUsuario(); ?></span>

           <div class="form-group row">
               <label for="inputApelido" class="col-sm-2 col-form-label">Nome de usuário: </label>
               <div class="col-sm-10">
                 <input value="" name="apelido" type="text" id="inputApelido"
                  class="cadastro form-control" placeholder="Ex: Fulano da Silva" required>
               </div>
           </div>
           <button class="btn btn-lg btn-primary btn-block cadastro-btn" type="submit" >
             Alterar nome de usuário
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
