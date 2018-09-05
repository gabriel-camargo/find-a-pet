<!DOCTYPE html>
<html>
  <head lang="pt-br">

    <?php
      require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'header.php');
     ?>

  </head>
  <body class="cadastro-body">
    <?php
      require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'navbar-deslogado.php');
     ?>

    <div class="container cadastro-formulario">
      <br>
      <form action="../func/cadastrar.php" class="form-signup" method="post">
        <h1 class="h3 mb-3 font-weight-bold cadastro-titulo"> Cadastre-se </h1><br>

          <!-- INPUT DO NOME -->
          <div class="form-group row">
              <label for="inputNome" class="col-sm-2 col-form-label">Nome completo: </label>
              <div class="col-sm-10">
                <input name="nome" type="text" id="inputNome" class="cadastro form-control"
                 placeholder="Ex: Fulano da Silva" required autofocus>
              </div>
          </div>

          <!-- INPUT DO EMAIL -->
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-2 col-form-label">Email: </label>
              <div class="col-sm-10">
                <input name="email" type="email" id="inputEmail" class="cadastro form-control"
                 placeholder="Ex: fulanodasilva@email.com" required>
              </div>
          </div>

          <!-- INPUT DE SENHA -->
          <div class="form-group row">
            <label for="inputSenha" class="col-sm-2 col-form-label">Senha: </label>
            <div class="col-sm-10">
              <input name="senha" type="password" id="inputSenha" class="cadastro form-control"
               placeholder="**********" aria-describedby="passwordHelpBlock" required >
            </div>
          </div>

          <!-- CONFIRMAÇÃO DE SENHA -->
          <div class="form-group row">
            <label for="inputSenhaConfirmar" class="col-sm-2 col-form-label">
              Confirme sua senha:
            </label>
            <div class="col-sm-10">
              <input name="senhaConfirm" type="password" id="inputSenhaConfirmar" class="cadastro form-control"
               placeholder="**********" aria-describedby="passwordHelpBlock" required >
            </div>
          </div>

        <button class="btn btn-lg btn-primary btn-block cadastro-btn" type="submit" >Cadastrar <i class="fa fa-user-plus"></i></button>

      </form>
      <br>
    </div>

    <?php
      require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
     ?>

  </body>
</html>
