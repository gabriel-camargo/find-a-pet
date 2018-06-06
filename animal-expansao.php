<?php
  // session_start();
  require_once("config". DIRECTORY_SEPARATOR . "config.php");
  require_once("check.php");

  $user = new Usuario();
  $user->loadById($_SESSION['login']['usu_id']);

  $animal = new Animal();
  $animal->loadById($_SESSION['login']['ani_id']);
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

      <?php echo $animal . "<br>";

      if ($animal->getStatusAnimal() === 'perdido') {
        echo "Animal esta perdido";
        if ($user->getIdUsuario() != $animal->getIdAnimal()) {
          echo "<a href=\"adotar.php\" style=\"color:green;\"> Encontrei! </a>";
        }
      }
      else if ($animal->getStatusAnimal() === 'adocao') {
        echo "Animal esta em adoção";
        if ($user->getIdUsuario() != $animal->getIdAnimal()) {
          echo "<a href=\"adotar.php\" style=\"color:green;\"> Adotar! </a>";
        }
      }
      else if ($animal->getStatusAnimal() === 'encontrado') {
        $adocao = new Adocao();
        $adocao->loadByAnimal($animal->getIdAnimal());

        $adotador = new Usuario();
        $adotador->loadById($adocao->getIdAdotador());
        echo "Animal foi encontrado por: " . $adotador->getNomeUsuario();
      }
      else{
        $adocao = new Adocao();
        $adocao->loadByAnimal($animal->getIdAnimal());

        $adotador = new Usuario();
        $adotador->loadById($adocao->getIdAdotador());
        echo "Animal foi adotado por: " . $adotador->getNomeUsuario();
      }
      ?>

      <?php
        require_once('pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
       ?>
   </body>
 </html>
