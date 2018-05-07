<!DOCTYPE html>
<html>
  <head>

    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'header.php');
     ?>

  </head>
  <body>
    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'navbar.php');
     ?>

     <br><br><br><br><br>
     <div class="container">
       <?php

         require_once("config". DIRECTORY_SEPARATOR . "config.php");

         //$user = new Usuario("", "12345678901", "", "Ana Luiza", "alurs", "F", "ana@email.com", "@n@lu1z@", "36363636", "988225005", "1212122", "R. dos alfeneiros", "04", "Casa", "HP", "Londres", "EN");
         $user = new Usuario();
         $user->loadById(5);
         //$user->insert();

         echo $user;
         // echo $gabriel->getLogradouroUsuario();

        ?>

     </div>

     <?php
       require_once('pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
      ?>
  </body>
</html>
