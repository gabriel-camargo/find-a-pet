<?php
  // session_start();
  require_once(".." . DIRECTORY_SEPARATOR . "config". DIRECTORY_SEPARATOR . "config.php");
  require_once(".." . DIRECTORY_SEPARATOR . "func" . DIRECTORY_SEPARATOR . "check.php");

  $user = new Usuario();
  $user->loadById($_SESSION['login']['usu_id']);
 ?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <?php
      require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'header.php');
     ?>
  </head>
  <body>
    <?php
      require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'navbar.php');
     ?>

     <div class="container">
       <br>
       <a href="cadastro-animal.php" class="animal-link-acao"> Cadastrar um novo animal! </a>
       <br><br>

       <?php
       $animais = Animal::searchByUser($user->getIdUsuario());

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
                 <img class="publicacao-foto" src="<?php echo ".." . DIRECTORY_SEPARATOR . "img"
                  . DIRECTORY_SEPARATOR . "animal" . DIRECTORY_SEPARATOR . $animal->getIdAnimal()
                   . DIRECTORY_SEPARATOR . $animal->getFotoAnimal(); ?>" alt="" height="140" width="140">
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

     <?php
       require_once(".." . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
      ?>
  </body>
</html>
