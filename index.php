<!DOCTYPE html>
<html>
  <head>

    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-bootstrap' . DIRECTORY_SEPARATOR . 'header.php');
     ?>

  </head>
  <body>
    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-bootstrap' . DIRECTORY_SEPARATOR . 'navbar.php');
     ?>

     <br><br><br><br><br>
     <div class="container">
       <?php

         require_once("config". DIRECTORY_SEPARATOR . "config.php");

         $gabriel = new Usuario();
         $gabriel->loadById(1);

         $ana = new Usuario();
         $ana->loadById(2);

         echo $gabriel . "<br><br>";
         echo $ana . "<br>";

        ?>

     </div>

     <?php
       require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-bootstrap' . DIRECTORY_SEPARATOR . 'codigos-js.php');
      ?>
  </body>
</html>
