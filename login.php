<?php
session_start();

require('config/init.php');
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-bootstrap' . DIRECTORY_SEPARATOR . 'header.php');
     ?>
     <link rel="stylesheet" href="css/login.css">

  </head>

  <body class="text-center">


    <form class="form-signin" method="post">


    <!--  <img class="mb-4" src="img/logo.png" alt="Logo Find a Pet" width="72" height="72"> -->

      <h1 class="h4 mb-3 font-weight-bold" >Bem vindo ao Find a Pet!</h1>
      <h2 class="h5 mb-3 font-weight-bold text-muted">Doe ou adote um novo amigo :)</h2>

      <label for="inputEmail" class="sr-only">Email address</label>
      <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>

      <label for="inputPassword" class="sr-only">Password</label>
      <input name ="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" required>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembrar senha
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" id="btn_entrar">Entrar</button>
      <p class="mt-5 mb-3 text-muted" id="txt_cadastro"> Não tem uma conta?
          <a href="#" class="link"> Cadastre-se </a>
      </p>
    </form>



    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-bootstrap' . DIRECTORY_SEPARATOR . 'codigos-js.php');
     ?>

  </body>
</html>
