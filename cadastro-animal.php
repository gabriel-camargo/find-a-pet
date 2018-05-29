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

      <form action="cadastrar-animal.php" class="sign-animal" method="post">
        <div class="container">

          <h1 class="h4 mb-3 font-weight-bold titulo"> Cadastre seu animal </h1><br>

          <!-- INPUT DA IMAGEM -->
          <div class="form-group row" id="div-foto">
            <div class="col-lg-3">
              <img id="imagem-perfil" src="img/logo.png" alt="your image" width="200" height="200"/>
            </div>
            <div class="col-lg-9">
              <div class="custom-file">
                <input name="foto" type="file" class="custom-file-input" id="inputFoto">
                <label class="custom-file-label" for="inputFoto">Escolha uma imagem...</label>
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
                  			<option value=""></option>
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
                    <option value=""></option>
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
              <input name="nome" type="text" id="inputNome" class="form-control" placeholder="Ex: Totó">
          </div>
        </div>


        <!-- INPUT DA FAIXA ETARIA -->
          <div class="form-group row">
            <label for="inputFaixa" class="col-sm-2 col-form-label">Faixa etária: </label>
            <div class="col-sm-10">
              <select name="faixa" id="inputFaixa" class="form-control">
                <option value=""> Escolha uma faixa etária </option>
                <option value="Filhote"> Filhote (0 - 3 anos) </option>
                <option value="Comum"> Comum (4 - 9 anos) </option>
                <option value="Velho"> Velho ( > 10 anos) </option>
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
       <script src="js/carregar-imagem.js" type="text/javascript"></script>
       <script type="text/javascript">

     		$(document).ready(function () {

     			$.getJSON('js/racas_especies.json', function (data) {
     				var items = [];
     				var options = '<option value="">Escolha uma Espécie</option>';
     				$.each(data, function (key, val) {
     					options += '<option value="' + val.especie + '">' + val.especie + '</option>';
     				});
     				$("#inputEspecie").html(options);

     				$("#inputEspecie").change(function () {

     					var options_racas = '';
     					var str = "";

     					$("#inputEspecie option:selected").each(function () {
     						str += $(this).text();
     					});

     					$.each(data, function (key, val) {
     						if(val.especie == str) {
     							$.each(val.racas, function (key_raca, val_raca) {
     								options_racas += '<option value="' + val_raca + '">' + val_raca + '</option>';
     							});
     						}
     					});
     					$("#inputRaca").html(options_racas);

     				}).change();

     			});

     		});

     	</script>

  </body>
</html>
