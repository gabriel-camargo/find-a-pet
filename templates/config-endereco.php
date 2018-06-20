<?php
  // session_start();
  require_once(".." . DIRECTORY_SEPARATOR . "config". DIRECTORY_SEPARATOR . "config.php");
  require_once(".." . DIRECTORY_SEPARATOR . "func" . DIRECTORY_SEPARATOR . "check.php");

  $user = new Usuario();
  $user->loadById($_SESSION['login']['usu_id']);
 ?>

 <!DOCTYPE html>
 <html lang="pt-br" dir="ltr">
   <head>
     <?php
      require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'header.php');
      ?>
   </head>
   <body>
     <?php
       require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'navbar.php');
      ?>

      <div class="row" id="body-row">

        <?php require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'sidebar-config.php') ?>

     <!-- INICIO DA DIV DE CONTEUDO -->
     <div class="col py-3">

       <div class="container">
         <h3>Configurações de Endereço</h3>

         <span>Endereço atual:</span><br>
         <span>CEP: <?php echo $user->getCepUsuario(); ?></span>
         <span>Logradouro:  <?php echo $user->getLogradouroUsuario(); ?></span>
         <span>Número da Casa:  <?php echo $user->getNumeroEnderecoUsuario(); ?></span><br>
         <span>Bairro:  <?php echo $user->getBairroUsuario(); ?></span>
         <span>Complemento:  <?php echo $user->getComplementoUsuario(); ?></span><br>

         <form class="" action="../func/update-endereco.php" method="post">
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


           <button class="btn btn-lg btn-primary btn-block cadastro-btn" type="submit" > Atualizar Endereço </button>
         </form>

<br><br><br>

<span>Estado:  <?php echo $user->getUfUsuario(); ?></span>
<span>Cidade:  <?php echo $user->getCidadeUsuario(); ?></span><br>
         <form class="" action="../func/update-uf.php" method="post">
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
           <button class="btn btn-lg btn-primary btn-block cadastro-btn" type="submit" > Atualizar UF e Cidade </button>
         </form>

     </div>
     <!-- FIM DA DIV DE CONTEUDO-->

 </div>
 <!-- body-row END -->

      <?php
        require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
       ?>
       <script type="text/javascript">

     		$(document).ready(function () {

     			$.getJSON('../js/vendor/estados_cidades.json', function (data) {
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
