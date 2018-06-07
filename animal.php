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
  </head>
  <body>
    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'navbar.php');
     ?>

     <div class="container">
       <a href="cadastro-animal.php" style="color: green"> Cadastre um novo animal aqui! </a>

       <?php
       $animais = Animal::searchByUser($user->getIdUsuario());

       foreach ($animais as $row) {
         echo "<div class=\"animal-publicacao row\">" .
                "<div class=\"col-xs-3 animal-foto\">" .
                  "Foto" .
                "</div>" .
                "<div class=\"col-xs-9 animal-info\">" .
                  "<form class=\"\" action=\"info-animais.php\" method=\"post\">" .
                    "<input type=\"hidden\" name=\"id\" value=" . $row['ani_id'] . ">" .
                    "<button type=\"submit\" name=\"button\">" . $row['ani_nome'] . "</button>" .
                  "</form>" .
                  "<span>" . $row['ani_faixa_etaria'] . "</span> <br>" .
                  "<span>" . $row['ani_raca'] . "</span> <br>" .
                  "<span>" . $row['ani_sexo'] . "</span> <br>" .
                  "<span>" . $row['ani_status'] . "</span> <br>" . "</div></div>" ;
       }
       ?>

     <?php
       require_once('pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
      ?>
  </body>
</html>
