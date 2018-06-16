<!DOCTYPE html>
<html>
  <head lang="pt-br">

    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'header.php');
     ?>

  </head>
  <body class="cadastro-body">
    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'navbar-deslogado.php');
     ?>


    <div class="container cadastro-formulario">
      <br>
      <form action="cadastrar.php" class="form-signup" method="post">
        <h1 class="h3 mb-3 font-weight-bold cadastro-titulo"> Cadastre-se </h1><br>

        <!-- INÍCIO DA DIV DE DADOS PESSOAIS -->
        <div class="cadastro-sub-form">
          <h2 class="h5 mb-3 font-weight-bold"> Dados pessoais </h2>



          <!-- INPUT DO NOME -->
          <div class="form-group row">
              <label for="inputNome" class="col-sm-2 col-form-label">Nome completo: </label>
              <div class="col-sm-10">
                <input name="nome" type="text" id="inputNome" class="cadastro form-control" placeholder="Ex: Fulano da Silva" required autofocus>
              </div>
          </div>

          <!-- INPUT DO NOME DO USUARIO -->
          <div class="form-group row">
              <label for="inputNomeUsuario" class="col-sm-2 col-form-label">Nome de usuário: </label>
              <div class="col-sm-10">
                <input name="apelido" type="text" id="inputNomeUsuario" class="cadastro form-control" placeholder="Ex: fulanodasilva98" required>
              </div>
          </div>

          <!-- INPUT PARA VERIFICAR SE É PESSOA FÍSICA OU ORGANIZAÇÃO -->
          <div class="form-group row">
            <span class="col-sm-2"> Você é uma:  </span>

            <!-- RADIO CPF -->
            <div class="custom-control custom-radio col-sm-5">
              <input type="radio" id="pessoaRadio1" value="1" name="pessoaRadio" class="custom-control-input" checked>
              <label class="custom-control-label" for="pessoaRadio1">Pessoa Física</label>
            </div>

            <!-- RADIO CNPJ -->
            <div class="custom-control custom-radio col-sm-5">
              <input type="radio" id="pessoaRadio2" value="2" name="pessoaRadio" class="custom-control-input">
              <label class="custom-control-label" for="pessoaRadio2">Organização</label>
            </div>

          </div>

          <!-- CPF HABILITADO -->
          <div id="mostra-cpf" >

            <!-- INPUT DO CPF -->
            <div class="form-group row">
                <label for="inputCpf" class="col-sm-2 col-form-label">CPF: </label>
                <div class="col-sm-10">
                  <input name="cpf" type="text" id="inputCpf" class="cadastro form-control" placeholder="Ex: 448.349.138-27" aria-describedby="cpfHelpBlock">
                  <small id="cpfHelpBlock" class="form-text text-muted">
                    Digite apenas números
                  </small>
                </div>
            </div>

            <!-- INPUT DO CNPJ DESABILITADO -->
            <div class="form-group row">
                <label for="inputCnpjDisable" class="col-sm-2 col-form-label">CNPJ: </label>
                <div class="col-sm-10">
                  <input type="text" id="inputCnpjDisable" class="cadastro form-control" placeholder="Ex: 60.3323.123123" aria-describedby="cnpjDisableHelpBlock" disabled >
                  <small id="cnpjDisableHelpBlock" class="form-text text-muted">
                    Digite apenas números
                  </small>
                </div>
            </div>
          </div>

          <!-- CNPJ HABILITADO -->
          <div id="mostra-cnpj" hidden>

            <!-- INPUT DO CPF -->
            <div class="form-group row">
                <label for="inputCpfDisable" class="col-sm-2 col-form-label">CPF: </label>
                <div class="col-sm-10">
                  <input type="text" id="inputCpfDisable" class="cadastro form-control" placeholder="Ex: 448.349.138-27" aria-describedby="cpfHelpBlockDisable" disabled>
                  <small id="cpfHelpBlockDisable" class="form-text text-muted">
                    Digite apenas números
                  </small>
                </div>
            </div>

            <!-- INPUT DO CNPJ DESABILITADO -->
            <div class="form-group row">
                <label for="inputCnpj" class="col-sm-2 col-form-label">CNPJ: </label>
                <div class="col-sm-10">
                  <input name="cnpj" type="text" id="inputCnpj" class="cadastro form-control" placeholder="Ex: 60.3323.123123" aria-describedby="cnpjDisableHelpBlock">
                  <small id="cnpjHelpBlock" class="form-text text-muted">
                    Digite apenas números
                  </small>
                </div>
            </div>
          </div>


          <!-- INPUT DO SEXO -->
          <div class="form-group row">
            <span class="col-sm-2"> Sexo:  </span>

            <!-- RADIO MASCULINO -->
            <div class="custom-control custom-radio col-sm-5">
              <input type="radio" id="sexoRadio1" value="M" name="sexoRadio" class="custom-control-input">
              <label class="custom-control-label" for="sexoRadio1">Masculino</label>
            </div>

            <!-- RADIO FEMININO -->
            <div class="custom-control custom-radio col-sm-5">
              <input type="radio" id="sexoRadio2" value="F" name="sexoRadio" class="custom-control-input">
              <label class="custom-control-label" for="sexoRadio2">Feminino</label>
            </div>

          </div>
        </div>

        <!-- FIM DA DIV DE DADOS PESSOAIS -->

        <!-- INICIO DA DIV DE DADOS DE CONTADO -->
        <div class="cadastro-sub-form">
          <h2 class="h5 mb-3 font-weight-bold"> Dados de contato </h2>

          <!-- INPUT DO EMAIL -->
          <div class="form-group row">
              <label for="inputEmail" class="col-sm-2 col-form-label">Email: </label>
              <div class="col-sm-10">
                <input name="email" type="email" id="inputEmail" class="cadastro form-control" placeholder="Ex: fulanodasilva@email.com" required>
              </div>
          </div>

          <!-- LINHA DA SENHA E CONFIRMAÇÃO DE SENHA -->
          <div class="form-group row">

              <!-- INPUT DA SENHA -->
            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputSenha" class="col-sm-4 col-form-label">Senha: </label>
                <div class="col-sm-8">
                  <input name="senha" type="password" id="inputSenha" class="cadastro form-control" placeholder="**********" aria-describedby="passwordHelpBlock" required >
                  <small id="passwordHelpBlock" class="form-text text-muted">
                    Sua senha deve conter entre 8 e 20 caracteres, e ao menos 1 letra maiúscula.
                  </small>
                </div>
              </div>
            </div>

            <!-- INPUT DA CONFIRMAÇÃO DE SENHA -->
            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputSenhaConfirmar" class="col-sm-4 col-form-label">Confirme sua senha: </label>
                <div class="col-sm-8">
                  <input name="senhaConfirm" type="password" id="inputSenhaConfirmar" class="cadastro form-control" placeholder="**********" required>
                </div>
              </div>
            </div>
          </div>

          <!-- LINHA DO TELEFONE E DO CELULAR -->
          <div class="form-group row">

            <!-- INPUT DO TELEFONE -->
            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputTelefone" class="col-sm-4 col-form-label">Telefone: </label>
                <div class="col-sm-8">
                  <input name="telefone" type="tel" id="inputTelefone" class="cadastro form-control" placeholder="(xx) xxxx- xxxx">
                </div>
              </div>
            </div>

            <!-- INPUT DO CELULAR -->
            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputCelular" class="col-sm-4 col-form-label">Celular: </label>
                <div class="col-sm-8">
                  <input name="celular" type="tel" id="inputCelular" class="cadastro form-control" placeholder="(xx) xxxxx- xxxx">
                </div>
              </div>
            </div>

          </div>
          <!-- FIM DA LINHA DE TELEFONE E CELULAR -->

        </div>
        <!-- FIM DA DIV DE DADOS DE CONTATO -->

        <!-- INÍCIO DA DIV DE ENDEREÇOS -->
        <div class="cadastro-sub-form">
          <h2 class="h5 mb-3 font-weight-bold"> Localização </h2>

          <!-- LINHA DE CEP, LOGRADOURO E NÚMERO -->
          <div class="form-group row">

            <!-- INPUT DO CEP -->
            <div class="col-lg-3">
              <div class="form-group row">
                <label for="inputCep" class="col-sm-4 col-form-label">Cep: </label>
                <div class="col-sm-8">
                  <input name="cep" type="text" id="inputCep" class="cadastro form-control" placeholder="Ex: 12402-040" aria-describedby="cepHelpBlock">
                </div>
              </div>
            </div>

            <!-- INPUT DO LOGRADOURO -->
            <div class="col-lg-7">
              <div class="form-group row">
                <label for="inputLogradouro" class="col-sm-2 col-form-label">Logradouro: </label>
                <div class="col-sm-10">
                  <input name="logradouro" type="text" id="inputLogradouro" class="cadastro form-control" placeholder="Ex: R. frederico de Souza Lima">
                </div>
              </div>
            </div>

            <!-- INPUT DO NÚMERO -->
            <div class="col-lg-2">
              <div class="form-group row">
                <label for="inputNumero" class="col-sm-5 col-form-label">Numero: </label>
                <div class="col-sm-7">
                  <input name="numero" type="text" id="inputNumero" class="cadastro form-control" placeholder="Ex: 45">
                </div>
              </div>
            </div>

          </div>
          <!-- FIM DA LINHA DE CEP, LOGRADOURO E NUMERO -->

          <!-- LINHA DO BAIRRO E COMPLEMENTO -->
          <div class="form-group row">

            <!-- INPUT DO BAIRRO -->
            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputBairro" class="col-sm-2 col-form-label">Bairro: </label>
                <div class="col-sm-10">
                  <input name="bairro" type="text" id="inputBairro" class="cadastro form-control" placeholder="Ex: Crispim">
                </div>
              </div>
            </div>

            <!-- INPUT DO COMPLEMENTO -->
            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputComplemento" class="col-sm-3 col-form-label">Complemento: </label>
                <div class="col-sm-9">
                  <input name="complemento" type="text" id="inputNumero" class="cadastro form-control" placeholder="Ex: ap. 107">
                </div>
              </div>
            </div>

          </div>
          <!-- FIM DA LINHA DO BAIRRO E COMPLEMENTO -->

          <!-- LINHA DE ESTADO E CIDADE -->
          <div class="form-group row">

            <!-- INPUT DO ESTADO -->
            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputEstado" class="col-sm-2 col-form-label">Estado: </label>
                <div class="col-sm-10">
                  <select name="estado" id="inputEstado" class="cadastro form-control">
                  			<option value=""></option>
                  </select>
                </div>
              </div>
            </div>

            <!-- INPUT DA CIDADE -->
            <div class="col-lg-6">
              <div class="form-group row">
                <label for="inputCidade" class="col-sm-3 col-form-label">Cidade: </label>
                <div class="col-sm-9">
                  <select name="cidade" id="inputCidade" class="cadastro form-control">

                  </select>
                </div>
              </div>
            </div>

          </div>
          <!-- FIM DA LINHA DE ESTADO E CIDADE -->

        </div>
        <!-- FIM DA DIV DE LOCALIZAÇÃO -->

        <button class="btn btn-lg btn-primary btn-block cadastro-btn" type="submit" >Cadastrar</button>

      </form>
      <br>
    </div>

    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
     ?>


     <script type="text/javascript">
      $('input:radio[name="pessoaRadio"]').change(function () {
        if ($(this).val() == 1) {
          $('#mostra-cpf').attr("hidden", false);
          $(this).attr("checked", true);

          $('#mostra-cnpj').attr("hidden", true);
          $(this).attr("checked", true);

        } else if ($(this).val() == 2) {
          $('#mostra-cnpj').attr("hidden", false);
          $(this).attr("checked", true);

          $('#mostra-cpf').attr("hidden", true);
          $(this).attr("checked", true);
        }
      });
      </script>


    	<script type="text/javascript">

    		$(document).ready(function () {

    			$.getJSON('js/vendor/estados_cidades.json', function (data) {
    				var items = [];
    				var options = '<option value="">Escolha um estado</option>';
    				$.each(data, function (key, val) {
    					options += '<option value="' + val.sigla + '">' + val.nome + '</option>';
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
