<!DOCTYPE html>
<html>
  <head>

    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'header.php');
     ?>

  </head>
  <body>
    <?php
      // require_once('pages' . DIRECTORY_SEPARATOR . 'navbar.php');
     ?>

     <br><br><br><br><br>
     <div class="container">
       <?php

         require_once("config". DIRECTORY_SEPARATOR . "config.php");

         $gabriel = new Usuario();
         $gabriel->loadById(3);

         echo $gabriel;
         // echo $gabriel->getLogradouroUsuario();

        ?>

     </div>

     <?php
       require_once('pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
      ?>
  </body>
</html>
