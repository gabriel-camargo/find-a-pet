<!DOCTYPE html>
<html>
  <head lang="pt-br">

    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-bootstrap' . DIRECTORY_SEPARATOR . 'header.php');
      // require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-materialize' . DIRECTORY_SEPARATOR . 'header.php');
     ?>
     <link rel="stylesheet" href="css/cadastro.css">
  </head>
  <body>
    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-bootstrap' . DIRECTORY_SEPARATOR . 'navbar.php');
      // require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-materialize' . DIRECTORY_SEPARATOR . 'navbar.php');
     ?>

    <div class="container formulario">
      <br>
      <form class="form-signup">
        <h1 class="h3 mb-3 font-weight-bold"> Cadastre-se </h1><br>

        <div class="sub-form">
          <h2 class="h5 mb-3 font-weight-bold"> Dados pessoais </h2>

          <div class="form-group row" id="div-foto">
            <div class="col-lg-3">
              <div class="imagem-usuario">
                <h6 id="txt_foto">Foto</h6>
              </div>

            </div>
            <div class="col-lg-9">
              <div class="form-group row">
                  <input type="file">
            </div>
          </div>
        </div>

          <div class="form-group row">
              <label for="inputNome" class="col-sm-2 col-form-label">Nome completo: </label>
              <div class="col-sm-10">
                <input type="text" id="inputNome" class="form-control" placeholder="Ex: Fulano da Silva" required autofocus>
              </div>
          </div>

          <div class="form-group row">
              <label for="inputNomeUsuario" class="col-sm-2 col-form-label">Nome de usuário: </label>
              <div class="col-sm-10">
                <input type="text" id="inputNomeUsuario" class="form-control" placeholder="Ex: fulanodasilva98" required>
              </div>
          </div>

          <div class="form-group row">
            <span class="col-sm-4"> Eu sou:  </span>
            <div class="custom-control custom-radio col-sm-4">
              <input type="radio" id="pessoaRadio1" name="pessoaRadio" class="custom-control-input">
              <label class="custom-control-label" for="pessoaRadio1">Pessoa física</label>
            </div>
            <div class="custom-control custom-radio col-sm-4">
              <input type="radio" id="pessoaRadio2" name="pessoaRadio" class="custom-control-input">
              <label class="custom-control-label" for="pessoaRadio2">ONG</label>
            </div>
          </div>

          <div class="form-group row">
              <label for="inputCpfCnpj" class="col-sm-2 col-form-label">CPF / CNPJ: </label>
              <div class="col-sm-10">
                <input type="text" id="inputCpfCnpj" class="form-control" placeholder="Ex: 448.349.138-27" aria-describedby="cpfHelpBlock" required >
                <small id="cpfHelpBlock" class="form-text text-muted">
                  Digite apenas números
                </small>
              </div>
          </div>

          <div class="form-group row">
            <span class="col-sm-4"> Sexo:  </span>
            <div class="custom-control custom-radio col-sm-4">
              <input type="radio" id="sexoRadio1" name="sexoRadio" class="custom-control-input">
              <label class="custom-control-label" for="sexoRadio1">Masculino</label>
            </div>
            <div class="custom-control custom-radio col-sm-4">
              <input type="radio" id="sexoRadio2" name="sexoRadio" class="custom-control-input">
              <label class="custom-control-label" for="sexoRadio2">Feminino</label>
            </div>
          </div>
        </div>

        <div class="sub-form">
          <h2 class="h5 mb-3 font-weight-bold"> Dados de contato </h2>

          <div class="form-group row">
              <label for="inputEmail" class="col-sm-2 col-form-label">Email: </label>
              <div class="col-sm-10">
                <input type="email" id="inputEmail" class="form-control" placeholder="Ex: fulanodasilva@email.com" required>
              </div>
          </div>

          <div class="form-group row">
              <label for="inputSenha" class="col-sm-2 col-form-label">Senha: </label>
              <div class="col-sm-10">
                <input type="password" id="inputSenha" class="form-control" placeholder="**********" aria-describedby="passwordHelpBlock" required >
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Sua senha deve conter entre 8 e 20 caracteres, e ao menos 1 letra maiúscula.
                </small>
              </div>
          </div>

          <div class="form-group row">
              <label for="inputSenhaConfirmar" class="col-sm-2 col-form-label">Confirme sua senha: </label>
              <div class="col-sm-10">
                <input type="password" id="inputSenhaConfirmar" class="form-control" placeholder="**********" required>
            </div>
          </div>

          <div class="form-group row">

            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputTelefone" class="col-sm-2 col-form-label">Telefone: </label>
                <div class="col-sm-10">
                  <input type="tel" id="inputTelefone" class="form-control" placeholder="(xx) xxxx- xxxx">
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputCelular" class="col-sm-2 col-form-label">Celular: </label>
                <div class="col-sm-10">
                  <input type="tel" id="inputCelular" class="form-control" placeholder="(xx) xxxx- xxxx">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="sub-form">
          <h2 class="h5 mb-3 font-weight-bold"> Localização </h2>

          <div class="form-group row">
              <label for="inputCep" class="col-sm-2 col-form-label">Cep: </label>
              <div class="col-sm-10">
                <input type="text" id="inputCep" class="form-control" placeholder="Ex: 12402-040" aria-describedby="cepHelpBlock" required >
                <small id="cepHelpBlock" class="form-text text-muted">
                  Não sabe seu cep? Clique aqui
                </small>
            </div>
          </div>

          <div class="form-group row">
              <label for="inputEndereço" class="col-sm-2 col-form-label">Endereço: </label>
              <div class="col-sm-10">
                <input type="text" id="inputEndereco" class="form-control" placeholder="Ex: R. frederico de Souza Lima" required>
              </div>
          </div>

          <div class="form-group row">
            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputNumero" class="col-sm-2 col-form-label">Número: </label>
                <div class="col-sm-10">
                  <input type="text" id="inputNumero" class="form-control" placeholder="Ex: 65" required>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputComplemento" class="col-sm-3 col-form-label">Complemento: </label>
                <div class="col-sm-9">
                  <input type="text" id="inputNumero" class="form-control" placeholder="Ex: ap. 107" required>
                </div>
              </div>

            </div>

          </div>

          <div class="form-group row">

            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputEstado" class="col-sm-2 col-form-label">Estado: </label>
                <div class="col-sm-10">
                  <input type="tel" id="inputEstado" class="form-control" placeholder="Ex: São Paulo">
                </div>
              </div>
            </div>


            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputCidade" class="col-sm-2 col-form-label">Cidade: </label>
                <div class="col-sm-10">
                  <input type="tel" id="inputCidade" class="form-control" placeholder="Ex: Pindamonhangaba">
                </div>
              </div>
            </div>
          </div>
        </div>




        <button class="btn btn-lg btn-primary btn-block" type="submit" id="btn_cadastrar">Cadastrar</button>

      </form>

      <br>
    </div>
    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-bootstrap' . DIRECTORY_SEPARATOR . 'codigos-js.php');
      // require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-materialize' . DIRECTORY_SEPARATOR . 'codigos-js.php');
     ?>

  </body>
</html>
