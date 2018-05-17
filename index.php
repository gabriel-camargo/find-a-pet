<?php
  // session_start();
  require_once("config". DIRECTORY_SEPARATOR . "config.php");
  require_once("check.php");
 ?>

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


         echo "ID: " . $_SESSION['login']['usu_id'] . "<br>"
          . "CPF: " . $_SESSION['login']['usu_cpf'] . "<br>"
          . "CNPJ: " . $_SESSION['login']['usu_cnpj'] . "<br>"
          . "NOME: " . $_SESSION['login']['usu_nome'] . "<br>"
          . "APELIDO: " . $_SESSION['login']['usu_apelido'] . "<br>"
          . "SEXO: " . $_SESSION['login']['usu_sexo'] . "<br>"
          . "EMAIL: " . $_SESSION['login']['usu_email'] . "<br>"
          . "SENHA: " . $_SESSION['login']['usu_senha'] . "<br>"
          . "TELEFONE: " . $_SESSION['login']['usu_telefone'] . "<br>"
          . "CELULAR: " . $_SESSION['login']['usu_celular'] . "<br>"
          . "CEP: " . $_SESSION['login']['usu_cep'] . "<br>"
          . "LOGRADOURO: " . $_SESSION['login']['usu_logradouro'] . "<br>"
          . "NUMERO DO ENDEREÇO: " . $_SESSION['login']['usu_numero_end'] . "<br>"
          . "COMPLEMENTO: " . $_SESSION['login']['usu_complemento'] . "<br>"
          . "BAIRRO: " . $_SESSION['login']['usu_bairro'] . "<br>"
          . "CIDADE: " . $_SESSION['login']['usu_cidade'] . "<br>"
          . "ESTADO: " . $_SESSION['login']['usu_uf'] . "<br>";

        ?>

     </div>

     <?php
       require_once('pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
      ?>
  </body>
</html>
