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

      if ($animal->getStatusAnimal() === 'perdido' or $animal->getStatusAnimal() === 'adocao') {
        if ($user->getIdUsuario() == $animal->getIdUsuario()) {
          ?>
          <form class="" action="adotar.php" method="post">
            <select name="adotador" id="inputAdotador" class="animal-expansao form-control">
                  <option value="">Selecione o usuário que adotou/encontrou o animal</option>

            <?php
              $usuarios = Usuario::getList($user->getIdUsuario());
              foreach ($usuarios as $row) {
                echo "<option value=\"" .$row["usu_id"]. "\">" . $row["usu_nome"] . "</option>";
              }
             ?>
             </select>
             <button type="submit" name="button"> Enviar </button>
          </form>
          <?php
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
