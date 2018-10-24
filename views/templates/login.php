<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <?php
      require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'header.php');
     ?>
  </head>

  <body class="login-body text-center">


    <form action="../func/autenticar.php" class="login-form-signin" method="post">


    <!--  <img class="mb-4" src="img/logo.png" alt="Logo Find a Pet" width="72" height="72"> -->

      <h1 class="h4 mb-3 font-weight-bold" >Bem vindo ao Find a Pet!</h1>
      <h2 class="h5 mb-3 font-weight-bold text-muted">Doe ou adote um novo amigo</h2>

      <label for="inputEmail" class="sr-only">Email address</label>
      <input name="email" type="email" id="inputEmail" class="login form-control" placeholder="Email" required autofocus>

      <label for="inputPassword" class="sr-only">Password</label>
      <input name ="senha" type="password" id="inputPassword" class="login form-control" placeholder="Senha" required>

      <button class="btn btn-lg btn-primary btn-block login-btn-entrar" type="submit" id="btn_entrar">Entrar <i class="fa fa-sign-in-alt"></i></button>

      <p class="mt-5 mb-3 text-muted" id="txt_cadastro"> Não tem uma conta?
          <a href="cadastro.php" class="login-link"> Cadastre-se </a>
      </p>
    </form>

    <?php
      require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
     ?>

  </body>
</html>
