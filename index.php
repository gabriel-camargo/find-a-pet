<?php
  // session_start();
  require_once("config". DIRECTORY_SEPARATOR . "config.php");
  require_once("check.php");

  $user = new Usuario();
  $user->loadById($_SESSION['login']['usu_id']);
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


         echo "ID: " . $user->getIdUsuario() . "<br>"
          . "CPF: " . $user->getCpfUsuario() . "<br>"
          . "CNPJ: " . $user->getCnpjUsuario() . "<br>"
          . "NOME: " . $user->getNomeUsuario() . "<br>"
          . "APELIDO: " . $user->getApelidoUsuario() . "<br>"
          . "SEXO: " . $user->getSexoUsuario() . "<br>"
          . "EMAIL: " . $user->getEmailUsuario() . "<br>"
          . "SENHA: " . $user->getSenhaUsuario() . "<br>"
          . "TELEFONE: " . $user->getTelefoneUsuario() . "<br>"
          . "CELULAR: " . $user->getCelularUsuario() . "<br>"
          . "CEP: " . $user->getCepUsuario() . "<br>"
          . "LOGRADOURO: " . $user->getLogradouroUsuario() . "<br>"
          . "NUMERO DO ENDEREÇO: " . $user->getNumeroEnderecoUsuario() . "<br>"
          . "COMPLEMENTO: " . $user->getComplementoUsuario() . "<br>"
          . "BAIRRO: " . $user->getBairroUsuario() . "<br>"
          . "CIDADE: " . $user->getCidadeUsuario() . "<br>"
          . "ESTADO: " . $user->getUfUsuario() . "<br>";

        ?>

     </div>

     <?php
       require_once('pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
      ?>
  </body>
</html>
