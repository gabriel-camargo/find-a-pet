<!DOCTYPE html>
<html>
  <head lang="pt-br">

    <?php
      require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'header.php');
     ?>

  </head>
  <body class="cadastro-body text-center">
      <form action="../func/cadastrar.php" class="cadastro-form-signup" method="post">
        <h1 class="h3 mb-3 font-weight-bold cadastro-titulo"> Cadastre-se </h1><br>

          <!-- INPUT DO NOME -->
          <label for="inputNome" class="sr-only">Nome completo</label>
          <input name="nome" type="text" id="inputNome" class="cadastro form-control"
           placeholder="Nome completo" required autofocus>

          <!-- INPUT DO EMAIL -->
          <label for="inputEmail" class="sr-only">Email</label>
          <input name="email" type="email" id="inputEmail" class="cadastro form-control"
           placeholder="Email" required>

          <!-- INPUT DE SENHA -->
          <label for="inputSenha" class="sr-only">Senha</label>
          <input name="senha" type="password" id="inputSenha" class="cadastro form-control"
           placeholder="Senha" required >

          <!-- CONFIRMAÇÃO DE SENHA -->
          <label for="inputSenhaConfirm" class="sr-only">Senha</label>
          <input type="password" id="inputSenhaConfirm" class="cadastro form-control"
           placeholder="Confirmar senha" required >

        <button class="btn btn-lg btn-primary btn-block cadastro-btn" type="submit" >Cadastrar <i class="fa fa-user-plus"></i></button>

        <p class="mt-3 mb-1 text-muted" id="txt_cadastro"> ja possui uma conta?
            <a href="login.php" class="login-link"> Faça login</a>
        </p>
      </form>

    <?php
      require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
     ?>

  </body>
</html>
