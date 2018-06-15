<?php
  // session_start();
  require_once("config". DIRECTORY_SEPARATOR . "config.php");
  require_once("check.php");

  $user = new Usuario();
  $user->loadById($_SESSION['login']['usu_id']);

  $animal = new Animal();
  $animal->loadById($_SESSION['login']['ani_id']);

  $dono = new Usuario();
  $dono->loadById($animal->getIdUsuario());
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
        <table class="expansao-table">

          <tr>
            <td class="expansao-table-td td-foto" rowspan="6">
              <div class="expansao-foto">

              </div>
            </td>
          </tr>
          <tr>
            <td class="expansao-table-td expansao-td-nome"><?php echo $animal->getNomeAnimal(); ?></td>
          </tr>
          <tr>
            <td class="expansao-table-td"><?php echo $animal->getStatusAnimal(); ?></td>
          </tr>
          <tr>
            <td class="expansao-table-td"><?php echo $animal->getRacaAnimal(); ?></td>
          </tr>
          <tr>
            <td class="expansao-table-td"><?php echo $animal->getSexoAnimal(); ?></td>
          </tr>
          <tr>
            <td class="expansao-table-td"><?php echo $animal->getfaixaAnimal(); ?></td>
          </tr>
          </table>


        <?php

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
               <br>
               <button class="btn btn-lg btn-primary btn-block expansao-btn" type="submit" name="button"> Enviar </button>
            </form>
            <?php
          }
          else{
            ?>

            <div class="expansao-info-dono">
              <span class"expansao-info-titulo"> <br>Dados do dono: <br><br> </span>
              <span class="expansao-info"> Nome: <?php echo $dono->getNomeUsuario(); ?> <br></span>
              <span class="expansao-info"> Celular: <?php echo $dono->getCelularUsuario(); ?> <br></span>
              <span class="expansao-info"> Email: <?php echo $dono->getEmailUsuario(); ?> <br></span>
            </div>

            <div class="expansao-info-dono">
              <span class"expansao-info-titulo"> <br>Localização: <br><br> </span>
              <span class="expansao-info"> Cidade: <?php echo $dono->getCidadeUsuario(); ?> <br></span>
              <span class="expansao-info"> Cep: <?php echo $dono->getCepUsuario(); ?> <br></span>
              <span class="expansao-info"> Bairro: <?php echo $dono->getBairroUsuario(); ?> <br></span>
            </div>

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
      </div>



      <?php
        require_once('pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
       ?>
   </body>
 </html>
