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
     <link rel="stylesheet" href="css/cadastro-animal.css">
  </head>
  <body>
    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'navbar.php');
     ?>

      <form class="sign-animal">
        <div class="container">

          <h1 class="h4 mb-3 font-weight-bold titulo"> Cadastre seu animal </h1><br>

          <!-- INPUT DA IMAGEM -->
          <div class="form-group row" id="div-foto">
            <div class="col-lg-3">
              <div class="imagem-animal">
                <h6 id="txt_foto">Adicionar foto</h6>
              </div>

            </div>
            <div class="col-lg-9">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                <label class="custom-file-label" for="validatedCustomFile">Escolha uma imagem...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
          </div>
        </div>
        <!-- FIM DO INPUT DA IMAGEM -->

          <!-- LINHA DE RAÇA E ESPÉCIE -->
          <div class="form-group row">

            <!-- INPUT DA ESPÉCIE-->
            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputEspecie" class="col-sm-2 col-form-label">Espécie: </label>
                <div class="col-sm-10">
                  <select name="especie" id="inputEspecie" class="form-control">
                  			<option value=""> Escolha uma espécie </option>
                  </select>
                </div>
              </div>
            </div>

            <!-- INPUT DA RAÇA -->
            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputRaca" class="col-sm-2 col-form-label">Raça: </label>
                <div class="col-sm-10">
                  <select name="raca" id="inputRaca" class="form-control">
                    <option value=""> Escolha uma raça </option>
                  </select>
                </div>
              </div>
            </div>

          </div>
          <!-- FIM DA LINHA DE ESTADO E CIDADE -->



        <!-- INPUT DO NOME -->
        <div class="form-group row">
          <label for="inputNome" class="col-sm-2 col-form-label">Nome: </label>
          <div class="col-sm-10">
              <input type="text" id="inputNome" class="form-control" placeholder="Ex: Totó" required autofocus>
          </div>
        </div>


        <!-- INPUT DA FAIXA ETARIA -->
          <div class="form-group row">
            <label for="inputFaixa" class="col-sm-2 col-form-label">Faixa etária: </label>
            <div class="col-sm-10">
              <select name="faixa" id="inputFaixa" class="form-control">
                <option value=""> Escolha uma faixa etária </option>
              </select>
            </div>
          </div>

          <!-- INPUT DO SEXO -->
          <div class="form-group row">
            <span class="col-sm-2"> Sexo:  </span>

            <!-- RADIO MASCULINO -->
            <div class="custom-control custom-radio col-sm-5">
              <input type="radio" id="sexoRadio1" value="M" name="sexoRadio" class="custom-control-input">
              <label class="custom-control-label" for="sexoRadio1">Macho</label>
            </div>

            <!-- RADIO FEMININO -->
            <div class="custom-control custom-radio col-sm-5">
              <input type="radio" id="sexoRadio2" value="F" name="sexoRadio" class="custom-control-input">
              <label class="custom-control-label" for="sexoRadio2">Fêmea</label>
            </div>

          </div>

          <!-- INPUT DA STATUS -->
          <div class="form-group row">
            <span class="col-sm-2"> Status:  </span>

            <!-- RADIO EM ADOÇÃO-->
            <div class="custom-control custom-radio col-sm-5">
              <input type="radio" id="statusRadio1" value="adocao" name="statusRadio" class="custom-control-input">
              <label class="custom-control-label" for="statusRadio1">Em adoção</label>
            </div>

            <!-- RADIO PERIDDO-->
            <div class="custom-control custom-radio col-sm-5">
              <input type="radio" id="statusRadio2" value="perdido" name="statusRadio" class="custom-control-input">
              <label class="custom-control-label" for="statusRadio2">Perdido</label>
            </div>

          </div>

        <div class="form-group row">
            <label for="inputInformacoes" class="col-sm-2 col-form-label">Informações adicionais: </label>
            <div class="col-sm-10">
              <textarea name="informacoes" class="form-control" id="inputInformacoes" rows="3" placeholder="Ex: Vacinado e castrado."></textarea>
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
