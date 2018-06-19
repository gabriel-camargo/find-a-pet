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
                 <img class="publicacao-foto" src="<?php echo "img" . DIRECTORY_SEPARATOR . "animal" . DIRECTORY_SEPARATOR . $animal->getIdAnimal() . DIRECTORY_SEPARATOR . $animal->getFotoAnimal(); ?>" alt="" height="140" width="140">
                 <?php
               } ?>
             </td>
           </tr>
           <tr>
             <td class="publicacao-td publicacao-form">
               <form class="" action="info-animais.php" method="post">
               <input type="hidden" name="id" value="<?php echo $row['ani_id']; ?>">
               <button class="publicacao-botao" type="submit" name="button"><?php echo $row['ani_nome']; ?></button>
             </form>
           </td>
           </tr>
           <tr>
             <td class="publicacao-sexo publicacao-td"><?php echo $row['ani_sexo']; ?></td>
           </tr>
           <tr>
             <td class="publicacao-status publicacao-td"><?php echo $row['ani_status']; ?></td>
           </tr>
           <tr>
             <td class="publicacao-raca publicacao-td"><?php echo $row['ani_raca']; ?></td>
           </tr>
           <tr>
             <td class="publicacao-faixa publicacao-td"><?php echo $row['ani_faixa_etaria']; ?></td>
           </tr>
           </table>
           <br>
         <?php
       }
       ?>

     <?php
       require_once('pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
      ?>
  </body>
</html>
