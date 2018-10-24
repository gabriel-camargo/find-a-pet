<?php

  require_once(".." . DIRECTORY_SEPARATOR . "config". DIRECTORY_SEPARATOR . "config.php");
  require_once(".." . DIRECTORY_SEPARATOR . "func" . DIRECTORY_SEPARATOR . "check.php");

  $user = new Usuario();
  $user->loadById($_SESSION['login']['usu_id']);
 ?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>

    <?php
      require_once(".." . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'header.php');
     ?>

     <style media="screen">
       div.row{
         border: 1px solid red;
       }
       div.col-3, div.col-9{
         border: 1px solid blue;
         height: 90vh;
       }

       div.sidebar{
         border: 1px solid orange;
         height: 100%;
       }

       div.card{
         border: 1px solid pink;
         height: 250px;
       }
     </style>
  </head>
  <body>
    <?php
      require_once(".." . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'navbar.php');
     ?>
       <div class="container">
<div class="row">
<div class="col-3 p-3">

  <div class="sidebar"></div>
</div>
<div class="col-9">
<div class="row pt-3">
  <?php
  $a = 0;


  while ($a <= 2) {
    ?>

      <div class="col-4 card">

      </div>



    <?php $a+=1; ?>
    <?php
  }
  ?>
</div>
</div>
</div>
       </div>

     <?php
       require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
      ?>
      <script type="text/javascript" src="../js/sidebar.js"></script>
  </body>
</html>
