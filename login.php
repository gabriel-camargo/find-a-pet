<!doctype html>
<html lang="pt-br">
  <head>
    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-bootstrap' . DIRECTORY_SEPARATOR . 'header.php');
     ?>
     <link rel="stylesheet" href="css/login.css">

  </head>

  <body class="text-center">


    <form action="login.php" class="form-signin" method="post">


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

      require_once("config" . DIRECTORY_SEPARATOR . "config.php");

      //resgata as variáveis do formulario
      $email = isset($_POST['email']) ? $_POST['email'] : '';
      $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

      //verifica se o campo de email ou de senha estão vazios
      if (empty($email) || empty($senha))
      {
          //echo "Informe email e senha";
          exit;
      }

      $sql = new Sql();

      //armazena todos os usuarios que possuem o email e senha informados e armazena na variavel
      $usuarios = $sql->select("SELECT usu_id, usu_nome FROM cad_usuarios WHERE usu_email = :EMAIL AND usu_senha = :SENHA",array(
        ":EMAIL" => $email,
        ":SENHA" => $senha
      ));

        //se nao for encontrado nenhum usuario
      if (count($usuarios) <= 0) {
        //echo "Email ou senha inválidos!";
      }else{
        $user = $usuarios[0];

        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['usu_id'] = $user['usu_id'];
        $_SESSION['usu_nome'] = $user['usu_nome'];

        header('Location: index.php');
      }
     ?>

    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-bootstrap' . DIRECTORY_SEPARATOR . 'codigos-js.php');
     ?>

  </body>
</html>
