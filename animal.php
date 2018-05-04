<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'header.php');
      // require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-materialize' . DIRECTORY_SEPARATOR . 'header.php');
     ?>
     <link rel="stylesheet" href="css/animal.css">
  </head>
  <body>
      <?php
        require_once('pages' . DIRECTORY_SEPARATOR . 'navbar.php');
        // require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-materialize' . DIRECTORY_SEPARATOR . 'navbar.php');
       ?>

    <div class=" container expansao-publicacao">
      <div class="row">
        <div class="col-3">
          <div class="publicacao-foto">

          </div>
        </div>

        <div class="col-9">
          <br>
          <span class="titulo-pub">Totó</span>
          <br><br>
          <div class="">
            <span class=""> Caracteristicas: Vira-lata, dócil, marrom, pequeno. </span> <br>
            <span class=""> Informações adicionais: Vacinado e castrado</span> <br>
            <span class=""> Atual dono: fulano 1 </span> <br>
            <span class=""> Contato do dono: fulano@email.com </span> <br>
          </div>
        </div>
      </div>
    </div>

    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
      // require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-materialize' . DIRECTORY_SEPARATOR . 'codigos-js.php');
     ?>

  </body>
</html>
