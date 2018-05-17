<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>

    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'header.php');
     ?>
     <link rel="stylesheet" href="css/cadastro-animal.css">
  </head>
  <body>
    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'navbar.php');
     ?>

      <form class="sign-animal">
        <div class="container">

          <h1 class="h4 mb-3 font-weight-bold titulo"> Cadastre seu animal </h1><br>

          <div class="form-group row" id="div-foto">
            <div class="col-lg-3">
              <div class="imagem-animal">
                <h6 id="txt_foto">Adicionar foto</h6>
              </div>

            </div>
            <div class="col-lg-9">
              <div class="form-group row">
                  <input type="file">
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputNome" class="col-sm-2 col-form-label">Nome: </label>
          <div class="col-sm-10">
              <input type="text" id="inputNome" class="form-control" placeholder="Ex: Totó" required autofocus>
          </div>
        </div>



        <div class="form-group row">
            <label for="inputCaracteristicas" class="col-sm-2 col-form-label">Características: </label>
            <div class="col-sm-10">
              <textarea class="form-control" id="inputCaracteristicas" rows="3" placeholder="Ex: Vira-lata, Marrom, dócil, pequeno."></textarea>
            </div>

        </div>

        <div class="form-group row">
            <label for="inputInformacoes" class="col-sm-2 col-form-label">Informações adicionais: </label>
            <div class="col-sm-10">
              <textarea class="form-control" id="inputInformacoes" rows="3" placeholder="Ex: Vacinado e castrado."></textarea>
            </div>

        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit" id="btn_cadastrar">Cadastrar</button>


      </div>
      <br>
      </form>

      <?php
        require_once('pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
       ?>

  </body>
</html>
