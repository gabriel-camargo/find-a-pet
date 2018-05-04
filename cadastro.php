<!DOCTYPE html>
<html>
  <head lang="pt-br">

    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'header.php');
      // require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-materialize' . DIRECTORY_SEPARATOR . 'header.php');
     ?>
     <link rel="stylesheet" href="css/cadastro.css">
  </head>
  <body>
    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'navbar.php');
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
            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputSenha" class="col-sm-4 col-form-label">Senha: </label>
                <div class="col-sm-8">
                  <input type="password" id="inputSenha" class="form-control" placeholder="**********" aria-describedby="passwordHelpBlock" required >
                  <small id="passwordHelpBlock" class="form-text text-muted">
                    Sua senha deve conter entre 8 e 20 caracteres, e ao menos 1 letra maiúscula.
                  </small>
                </div>
              </div>

            </div>
            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputSenhaConfirmar" class="col-sm-4 col-form-label">Confirme sua senha: </label>
                <div class="col-sm-8">
                  <input type="password" id="inputSenhaConfirmar" class="form-control" placeholder="**********" required>
              </div>
              </div>

            </div>

          </div>

          <div class="form-group row">

            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputTelefone" class="col-sm-4 col-form-label">Telefone: </label>
                <div class="col-sm-8">
                  <input type="tel" id="inputTelefone" class="form-control" placeholder="(xx) xxxx- xxxx">
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputCelular" class="col-sm-4 col-form-label">Celular: </label>
                <div class="col-sm-8">
                  <input type="tel" id="inputCelular" class="form-control" placeholder="(xx) xxxxx- xxxx">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="sub-form">
          <h2 class="h5 mb-3 font-weight-bold"> Localização </h2>

          <div class="form-group row">
            <div class="col-lg-3">
              <div class="form-group row">
                <label for="inputCep" class="col-sm-4 col-form-label">Cep: </label>
                <div class="col-sm-8">
                  <input type="text" id="inputCep" class="form-control" placeholder="Ex: 12402-040" aria-describedby="cepHelpBlock" required >
                </div>
              </div>
            </div>

            <div class="col-lg-7">
              <div class="form-group row">
                <label for="inputLogradouro" class="col-sm-2 col-form-label">Logradouro: </label>
                <div class="col-sm-10">
                  <input type="text" id="inputLogradouro" class="form-control" placeholder="Ex: R. frederico de Souza Lima" required>
                </div>
              </div>
            </div>

            <div class="col-lg-2">
              <div class="form-group row">
                <label for="inputNumero" class="col-sm-5 col-form-label">Numero: </label>
                <div class="col-sm-7">
                  <input type="text" id="inputNumero" class="form-control" placeholder="Ex: 45" required>
                </div>
              </div>
            </div>

          </div>

          <div class="form-group row">
            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputBairro" class="col-sm-2 col-form-label">Bairro: </label>
                <div class="col-sm-10">
                  <input type="text" id="inputBairro" class="form-control" placeholder="Ex: Crispim" required>
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
                <!--  <input type="tel" id="inputEstado" class="form-control" placeholder="Ex: São Paulo">-->
                  <!-- <select name="estados-brasil" class="form-control">
                    <option value="" selected disabled hidden>Selecione um estado:</option>
                  	<option value="AC">Acre</option>
                  	<option value="AL">Alagoas</option>
                  	<option value="AP">Amapá</option>
                  	<option value="AM">Amazonas</option>
                  	<option value="BA">Bahia</option>
                  	<option value="CE">Ceará</option>
                  	<option value="DF">Distrito Federal</option>
                  	<option value="ES">Espírito Santo</option>
                  	<option value="GO">Goiás</option>
                  	<option value="MA">Maranhão</option>
                  	<option value="MT">Mato Grosso</option>
                  	<option value="MS">Mato Grosso do Sul</option>
                  	<option value="MG">Minas Gerais</option>
                  	<option value="PA">Pará</option>
                  	<option value="PB">Paraíba</option>
                  	<option value="PR">Paraná</option>
                  	<option value="PE">Pernambuco</option>
                  	<option value="PI">Piauí</option>
                  	<option value="RJ">Rio de Janeiro</option>
                  	<option value="RN">Rio Grande do Norte</option>
                  	<option value="RS">Rio Grande do Sul</option>
                  	<option value="RO">Rondônia</option>
                  	<option value="RR">Roraima</option>
                  	<option value="SC">Santa Catarina</option>
                  	<option value="SP">São Paulo</option>
                  	<option value="SE">Sergipe</option>
                  	<option value="TO">Tocantins</option>
                  </select> -->
                  <select id="inputEstado" class="form-control">
                  			<option value=""></option>
                  </select>
                </div>
              </div>
            </div>


            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputCidade" class="col-sm-3 col-form-label">Cidade: </label>
                <div class="col-sm-9">
                  <!-- <input type="tel" id="inputCidade" class="form-control" placeholder="Ex: Pindamonhangaba"> -->
                  <select id="inputCidade" class="form-control">
                  </select>
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
      require_once('pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
      // require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-materialize' . DIRECTORY_SEPARATOR . 'codigos-js.php');
     ?>


    	<script type="text/javascript">

    		$(document).ready(function () {

    			$.getJSON('js/vendor/estados_cidades.json', function (data) {
    				var items = [];
    				var options = '<option value="">escolha um estado</option>';
    				$.each(data, function (key, val) {
    					options += '<option value="' + val.nome + '">' + val.nome + '</option>';
    				});
    				$("#inputEstado").html(options);

    				$("#inputEstado").change(function () {

    					var options_cidades = '';
    					var str = "";

    					$("#inputEstado option:selected").each(function () {
    						str += $(this).text();
    					});

    					$.each(data, function (key, val) {
    						if(val.nome == str) {
    							$.each(val.cidades, function (key_city, val_city) {
    								options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
    							});
    						}
    					});
    					$("#inputCidade").html(options_cidades);

    				}).change();

    			});

    		});

    	</script>

  </body>
</html>
