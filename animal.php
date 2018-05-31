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
     <link rel="stylesheet" href="css/animal.css">
  </head>
  <body>
    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'navbar.php');
     ?>

     <div class="container">
       <a href="cadastro-animal.php" style="color: green"> Cadastre um novo animal aqui! </a>

       <div class="animal row">
         <div class="col-xs-3 foto">
           Foto
         </div>
         <div class="col-xs-9 info">
           <form class="" action="info-animais.php" method="post">
             <input type="hidden" name="id" value="1">
             <button type="submit" name="button"> Sei la kk</button>
           </form>
           <span>Nome</span><br>
           <span>Faixa etária</span><br>
           <span>Sexo</span><br>
           <span>Raça</span><br>
           <span>Status</span><br>
         </div>
       </div>
       <div class="animal row">
         <div class="col-xs-3 foto">
           Foto
         </div>
         <div class="col-xs-9 info">
           <form class="" action="info-animais.php" method="post">
             <input type="hidden" name="id" value="2">
             <button type="submit" name="button"> Sei la kk</button>
           </form>
           <span>Nome</span><br>
           <span>Faixa etária</span><br>
           <span>Sexo</span><br>
           <span>Raça</span><br>
           <span>Status</span><br>
         </div>
       </div>
     </div>

     <?php
       require_once('pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
      ?>
  </body>
</html>
