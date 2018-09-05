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
     <link rel="stylesheet" href="../css/sidebar.css">

  </head>
  <body>
    <?php
      require_once(".." . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'navbar.php');
     ?>

     <div class="row" id="body-row">

     <?php require_once(".." . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "sidebar.php") ?>

    <!-- INICIO DA DIV DE PUBLICAÇÕES -->
    <div class="col py-3">
        <?php

          // RECUPERA OS VALORES DO FORMULARIO
          $nav_nome = isset($_POST['nav_nome']) ? $_POST['nav_nome'] : '';

          // RETORNA UMA LISTA DE TODOS OS ANIMAIS QUE ESTÃO EM ADOÇÃO/PERDIDOS QUE NÃO SÃO DO USUÁRIO
          $animais = Animal::pesquisarAnimais($user->getIdUsuario(), $nav_nome);

          //SE NENHUM ANIMAL FOR ENCONTRADO
          if (count($animais) == 0) {
            echo "<h1> Nenhum animal encontrado </h1>";
          }
          // LE CADA ANIMAL ENCONTRADO
          foreach ($animais as $row) {
            $animal = new Animal();
            $animal->loadById($row['ani_id']);
            ?>
            <table class="publicacao-table">

              <tr>
                <td class="publicacao-td-foto" rowspan="6">
                  <?php if ($animal->getFotoAnimal() === "" || null === $animal->getFotoAnimal()) {
                    ?><div class="publicacao-foto">

                    </div><?php
                  }else{
                    ?>
                    <img class="publicacao-foto" src="<?=".." . DIRECTORY_SEPARATOR .
                    "img" . DIRECTORY_SEPARATOR . "animal" . DIRECTORY_SEPARATOR .
                    $animal->getIdAnimal() . DIRECTORY_SEPARATOR . $animal->getFotoAnimal(); ?>"
                     alt="" height="140" width="140">
                    <?php
                  } ?>
                </td>
              </tr>
              <tr>
                <td class="publicacao-td publicacao-form">
                  <?= $row['ani_nome']; ?>
                </td>
              </tr>
              <tr>
                <td class="publicacao-sexo publicacao-td"><?= $row['ani_sexo']; ?></td>
              </tr>
              <tr>
                <td class="publicacao-status publicacao-td"><?= $row['ani_status']; ?></td>
              </tr>
              <tr>
                <td class="publicacao-raca publicacao-td"><?= $row['ani_raca']; ?></td>
              </tr>
              <tr>
                <td class="publicacao-faixa publicacao-td"><?= $row['ani_faixa_etaria']; ?></td>
              </tr>
              </table>
              <br>
            <?php
          }
         ?>
    </div>
    <!-- FIM DA DIV DE PUBLICAÇÕES-->

</div>
<!-- body-row END -->

     <?php
       require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
      ?>
      <script type="text/javascript" src="../js/sidebar.js"></script>
  </body>
</html>
