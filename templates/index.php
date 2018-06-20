<?php
  // session_start();
  require_once(".." . DIRECTORY_SEPARATOR . "config". DIRECTORY_SEPARATOR . "config.php");
  require_once(".." . DIRECTORY_SEPARATOR . "func" . DIRECTORY_SEPARATOR . "check.php");

  $user = new Usuario();
  $user->loadById($_SESSION['login']['usu_id']);
 ?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>

    <?php
      require_once(".." . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'header.php');
     ?>
     <link rel="stylesheet" href="../css/sidebar.css">

  </head>
  <body>
    <?php
      require_once(".." . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'navbar.php');
     ?>

     <div class="row" id="body-row">

       <!-- INICIO DA BARRA LATERAL -->
      <div id="sidebar-container" class="sidebar-expanded d-none d-md-block col-2">

         <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
         <!-- Bootstrap List Group -->
        <ul class="list-group sticky-top sticky-offset" >

             <!-- Separator with title -->
             <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed" style="border-top: none">
                 <small class="sidebar-text">FILTRO DE PESQUISAS</small>
             </li>
             <!-- /END Separator -->


            <!-- MENU ESPECIE -->
            <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-light list-group-item list-group-item-action flex-column align-items-start">
                     <div class="d-flex w-100 justify-content-start align-items-center">

                     <span class="fa fa-dashboard fa-fw mr-3"></span>
                     <span class="menu-collapsed sidebar-text">Espécies</span>
                     <span class="submenu-icon ml-auto"></span>

                   </div>
            </a>

            <!-- SUBMENU DE ESPECIES-->
             <div id="submenu1" class="collapse sidebar-submenu">

               <!-- ITEM DE ESPECIES: CACHORRO -->
               <a href="#submenuCachorro" data-toggle="collapse" aria-expanded="false" class="bg-light list-group-item list-group-item-action flex-column align-items-start">
                       <div class="d-flex w-100 justify-content-start align-items-center">

                       <!-- <span class="fa fa-dashboard fa-fw mr-3"></span> -->
                       <span class="menu-collapsed sidebar-text">Cachorro</span>
                       <!-- <span class="submenu-icon ml-auto"></span> -->

                     </div>
              </a>

              <!-- SUBMENU DE CACHORRO -->
              <div id="submenuCachorro" class="collapse sidebar-submenu">

                <!-- CHECKBOX QUE MARCA/DESMARCA AS DEMAIS OPÇÕES -->
               <a href="#" class="list-group-item list-group-item-action bg-light text-white">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="raca-cachorro" id="check-todos-cachorro">
                    <label class="custom-control-label sidebar-text" for="check-todos-cachorro"><span class="menu-collapsed">Todos</span></label>
                  </div>
                </a>

                <!-- PEGA AS RAÇAS DE CACHORRO DO .JSON DAS RACAS E ESPECIES -->
                <?php
                // LE O ARQUIVO .JSON
                $arquivo = "../js/racas_especies.json";
                $info = file_get_contents($arquivo);
                $lendo = json_decode($info);

                // FOR PARA PERCORRER TODAS AS ESPECIES
                foreach($lendo as $especies){

                  $especie = $especies->especie;

                  // SE A ESPECIE FOR CACHORRO:
                  if ($especie === 'Cachorro') {
                    $racas = $especies->racas;

                      // LE TODAS AS RAÇAS DE CACHORRO
                      foreach ($racas as $raca) {
                        ?>
                        <a href="#" class="list-group-item list-group-item-action bg-light text-white">
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input check-cachorro" type="checkbox" name="raca-cachorro" value="<?php echo $raca; ?>" id="<?php echo $raca; ?>">
                            <label class="custom-control-label sidebar-text" for="<?php echo $raca; ?>"><span class="menu-collapsed"><?php echo $raca; ?></span></label>
                          </div>
                        </a>
                        <?php

                      }
                    }
                 }
                 ?>
              </div>
              <!-- FIM DA DIV DE SUBMENU DE CACHORRO -->

              <!-- ITEM DE ESPECIES: GATO -->
              <a href="#submenuGato" data-toggle="collapse" aria-expanded="false" class="bg-light list-group-item list-group-item-action flex-column align-items-start">
                      <div class="d-flex w-100 justify-content-start align-items-center">

                        <!-- <span class="fa fa-dashboard fa-fw mr-3"></span> -->
                      <span class="menu-collapsed sidebar-text">Gato</span>
                      <!-- <span class="submenu-icon ml-auto"></span> -->

                    </div>
             </a>

             <!-- SUBMENU DE GATO -->
             <div id="submenuGato" class="collapse sidebar-submenu">

               <!-- CHECKBOX QUE MARCA/DESMARCA OS DEMAIS CHECKBOX -->
               <a href="#" class="list-group-item list-group-item-action bg-light text-white">
                 <div class="custom-control custom-checkbox">
                   <input class="custom-control-input" type="checkbox" name="raca-gato" id="check-todos-gato">
                   <label class="custom-control-label sidebar-text" for="check-todos-gato"><span class="menu-collapsed">Todos</span></label>
                 </div>
               </a>

               <?php

               // LE TODAS AS ESPECIES
               foreach($lendo as $especies){

                 $especie = $especies->especie;

                 // SE A ESPECIE FOR GATO:
                 if ($especie === 'Gato') {
                   $racas = $especies->racas;

                     // LE TODAS AS RACAS DE GATO
                     foreach ($racas as $raca) {
                       ?>
                       <a href="#" class="list-group-item list-group-item-action bg-light text-white">
                         <div class="custom-control custom-checkbox">
                           <input class="custom-control-input check-gato" type="checkbox" name="raca-gato" value="<?php echo $raca; ?>" id="<?php echo $raca; ?>">
                           <label class="custom-control-label sidebar-text" for="<?php echo $raca; ?>"><span class="menu-collapsed"><?php echo $raca; ?></span></label>
                         </div>
                       </a>
                       <?php
                     }
                   }
                }
                ?>
             </div>
             <!-- FIM DO SUBMENU DE GATO -->
          </div>
           <!-- FIM DO SUBMENU DE ESPECIES -->

           <!-- MENU DE SEXO DOS ANIMAIS -->
            <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-light list-group-item list-group-item-action flex-column align-items-start">
               <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                   <span class="menu-collapsed sidebar-text">Sexo</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
           </a>

            <!-- SUBMENU DOS SEXO DOS ANIMAIS -->
           <div id="submenu2" class="collapse sidebar-submenu">

              <!-- CHECKBOX MACHO -->
              <a href="#" class="list-group-item list-group-item-action bg-light text-white">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input check-sexo" type="checkbox" name="sexo" value="M" id="macho">
                  <label class="custom-control-label sidebar-text" for="macho"><span class="menu-collapsed">Macho</span></label>
                </div>
              </a>

              <!-- CHECKBOX FEMEA -->
              <a href="#" class="list-group-item list-group-item-action bg-light text-white">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input check-sexo" type="checkbox" name="sexo" value="F" id="femea">
                  <label class="custom-control-label sidebar-text" for="femea"><span class="menu-collapsed">Femea</span></label>
                </div>
              </a>
            </div>
            <!-- FIM DO SUBMENU DE SEXO DOS ANIMAIS -->

            <!-- MENU DE STATUS DO ANIMAL -->
            <a href="#submenu3" data-toggle="collapse" aria-expanded="false" class="bg-light list-group-item list-group-item-action flex-column align-items-start">
               <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                   <span class="menu-collapsed sidebar-text">Status</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
           </a>

            <!-- SUBMENU DE STATUS DO ANIMAL -->
           <div id="submenu3" class="collapse sidebar-submenu">

              <!-- CHECKBOX DE ADOÇÃO -->
              <a href="#" class="list-group-item list-group-item-action bg-light text-white">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input check-status" type="checkbox" name="status" value="adocao" id="adocao">
                  <label class="custom-control-label sidebar-text" for="adocao"><span class="menu-collapsed">Em adoção</span></label>
                </div>
              </a>

              <!-- CHECKBOX DE PERDIDO -->
              <a href="#" class="list-group-item list-group-item-action bg-light text-white">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input check-status" type="checkbox" name="status" value="perdido" id="perdido">
                  <label class="custom-control-label sidebar-text" for="perdido"><span class="menu-collapsed">Perdido</span></label>
                </div>
              </a>
            </div>
            <!-- FIM DO SUBMENU DE STATUS DO ANIMAL -->

            <!-- MENU DE FAIXA ETARIA -->
            <a href="#submenu4" data-toggle="collapse" aria-expanded="false" class="bg-light list-group-item list-group-item-action flex-column align-items-start">
               <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                   <span class="menu-collapsed sidebar-text">Faixa etária</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
           </a>

            <!-- SUBMENU DE FAIXA-ETARIA -->
           <div id="submenu4" class="collapse sidebar-submenu">

              <!-- CHECKBOX FILHOTE -->
              <a href="#" class="list-group-item list-group-item-action bg-light text-white">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input check-faixa" type="checkbox" name="faixa" value="Filhote" id="filhote">
                  <label class="custom-control-label sidebar-text" for="filhote"><span class="menu-collapsed">Filhote</span></label>
                </div>
              </a>

              <!-- CHECKBOX COMUM -->
              <a href="#" class="list-group-item list-group-item-action bg-light text-white">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input check-faixa" type="checkbox" name="faixa" value="Comum" id="comum">
                  <label class="custom-control-label sidebar-text" for="comum"><span class="menu-collapsed">Comum</span></label>
                </div>
              </a>

              <!-- CHECKBOX VELHO -->
              <a href="#" class="list-group-item list-group-item-action bg-light text-white">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input check-faixa" type="checkbox" name="faixa" value="Velho" id="velho">
                  <label class="custom-control-label sidebar-text" for="velho"><span class="menu-collapsed">Velho</span></label>
                </div>
              </a>
            </div>
            <!-- FIM DO SUBMENU DE FAIXA-ETARIA -->

            <!-- Logo -->
             <!-- <li class="list-group-item logo-separator d-flex justify-content-center">
                <img src="https://v4-alpha.getbootstrap.com/assets/brand/bootstrap-solid.svg" width="30" height="30">
             </li> -->
        </ul>
       <!-- List Group END-->
     </div>
     <!-- FIM DA BARRA LATERAL -->

    <!-- INICIO DA DIV DE PUBLICAÇÕES -->
    <div class="col py-3">
        <?php

          // RECUPERA OS VALORES DO FORMULARIO
          $nav_nome = isset($_POST['nav_nome']) ? $_POST['nav_nome'] : '';

          // RETORNA UMA LISTA DE TODOS OS ANIMAIS QUE ESTÃO EM ADOÇÃO/PERDIDOS QUE NÃO SÃO DO USUÁRIO
          $animais = Animal::pesquisarAnimais($user->getIdUsuario(), $nav_nome);

          //SE NENHUM ANIMAL FOR ENCONTRADO
          if (count($animais) == 0) {
            echo "<h1> Nenhum animal encontrado </h1>";
          }
          // LE CADA ANIMAL ENCONTRADO
          foreach ($animais as $row) {
            $animal = new Animal();
            $animal->loadById($row['ani_id']);
            ?>
            <table class="publicacao-table">

              <tr>
                <td class="publicacao-td-foto" rowspan="6">
                  <?php if ($animal->getFotoAnimal() === "" || null === $animal->getFotoAnimal()) {
                    ?><div class="publicacao-foto">

                    </div><?php
                  }else{
                    ?>
                    <img class="publicacao-foto" src="<?php echo ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "animal" . DIRECTORY_SEPARATOR . $animal->getIdAnimal() . DIRECTORY_SEPARATOR . $animal->getFotoAnimal(); ?>" alt="" height="140" width="140">
                    <?php
                  } ?>
                </td>
              </tr>
              <tr>
                <td class="publicacao-td publicacao-form">
                  <form class="" action="../func/info-animais.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $row['ani_id']; ?>">
                  <button class="publicacao-botao" type="submit" name="button"><?php echo $row['ani_nome']; ?></button>
                </form>
              </td>
              </tr>
              <tr>
                <td class="publicacao-sexo publicacao-td"><?php echo $row['ani_sexo']; ?></td>
              </tr>
              <tr>
                <td class="publicacao-status publicacao-td"><?php echo $row['ani_status']; ?></td>
              </tr>
              <tr>
                <td class="publicacao-raca publicacao-td"><?php echo $row['ani_raca']; ?></td>
              </tr>
              <tr>
                <td class="publicacao-faixa publicacao-td"><?php echo $row['ani_faixa_etaria']; ?></td>
              </tr>
              </table>
              <br>
            <?php
          }
         ?>

    </div>
    <!-- FIM DA DIV DE PUBLICAÇÕES-->

</div>
<!-- body-row END -->

     <?php
       require_once('..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
      ?>
      <script type="text/javascript">

          /////////////////////////////////////////////////////
          //////////////// EFEITOS DA SIDEBAR ////////////////
          /////////////////////////////////////////////////////

          // Hide submenus
          $('#body-row .collapse').collapse('hide');

          // Collapse/Expand icon
          $('#collapse-icon').addClass('fa-angle-double-left');

          // Collapse click
          $('[data-toggle=sidebar-colapse]').click(function() {
            SidebarCollapse();
          });

          function SidebarCollapse () {
            $('.menu-collapsed').toggleClass('d-none');
            $('.sidebar-submenu').toggleClass('d-none');
            $('.submenu-icon').toggleClass('d-none');
            $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');

            // Treating d-flex/d-none on separators with title
            var SeparatorTitle = $('.sidebar-separator-title');
            if ( SeparatorTitle.hasClass('d-flex') ) {
                SeparatorTitle.removeClass('d-flex');
            } else {
                SeparatorTitle.addClass('d-flex');
            }

            // Collapse/Expand icon
            $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
          }

          ///////////////////////////////////////////////////////////////////////////
          //////////////// CHECKBOX MARCAR TODOS OS OUTROS CHECKBOX ////////////////
          ///////////////////////////////////////////////////////////////////////////

          var checkTodosCachorro = $("#check-todos-cachorro");
          checkTodosCachorro.click(function () {
            if ( $(this).is(':checked') ){
              $('.check-cachorro').prop("checked", true);
            }else{
              $('.check-cachorro').prop("checked", false);
            }
          });

          var checkTodosGato = $("#check-todos-gato");
          checkTodosGato.click(function () {
            if ( $(this).is(':checked') ){
              $('.check-gato').prop("checked", true);
            }else{
              $('.check-gato').prop("checked", false);
            }
          });

          //////////////////////////////////////////////////////
          //////////////// FILTRO DE PESQUISAS /////////////////
          //////////////////////////////////////////////////////
          $("input:checkbox").click(function () {

            var raca = ['Vira-lata', 'Dalmata', 'Puldo', 'Vira-lata de gato', 'Gatineo', 'Rei do Mundo'];
            var sexo = ['M', 'F'];
            var status = ['perdido', 'adocao'];
            var faixa = ['Filhote', 'Comum', 'Velho'];

            //SE NENHUM CHECKBOX FOR MARCADO, A LISTA PERMANECE COM TODOS OS ELEMENTOS
            //SE ALGUM CHECKBOX FOR MARCADO, A LISTA FICA APENAS COM OS VALORES DOS CHECKBOX MARCADOS
            if ($('.check-cachorro:checked').length > 0){
              raca=[];
              $('.check-cachorro:checked').each(function() {
                raca[raca.length] = $(this).val();
              });
            }

            if ($('.check-gato:checked').length > 0){
              raca =[];
              $('.check-gato:checked').each(function() {
                raca[raca.length] = $(this).val();
              });
            }

            if ($('.check-sexo:checked').length > 0){
              sexo =[];
              $('.check-sexo:checked').each(function() {
                sexo[sexo.length] = $(this).val();
              });
            }

            if ($('.check-faixa:checked').length > 0){
              faixa =[];
              $('.check-faixa:checked').each(function() {
                faixa[faixa.length] = $(this).val();
              });
            }

            if ($('.check-status:checked').length > 0){
              status =[];
              $('.check-status:checked').each(function() {
                status[status.length] = $(this).val();
              });
            }

            //ESCONDE TODAS AS TABELAS(PUBLICAÇÕES)
            $('table').hide();

            //MOSTRA AS TABELAS QUE CONTEREM AS INFORMAÇÕES DAS LISTAS ACIMA
            //OU SEJA, APENAS OS QUE TIVEREM SEUS CHECKBOX MARCADOS
            //OU, CASO NENHUM SEJA MARCADO, MOSTRAR TODOS OS VALORES
            $('table').each(function(i){
                var tr_raca   = $(this).find('tr td.publicacao-raca').text();
                var tr_faixa    = $(this).find('tr td.publicacao-faixa').text();
                var tr_sexo = $(this).find('tr td.publicacao-sexo').text();
                var tr_status    = $(this).find('tr td.publicacao-status').text();
                if ((raca.indexOf(tr_raca) >= 0) &&
                    (faixa.indexOf(tr_faixa) >= 0) &&
                    (sexo.indexOf(tr_sexo) >= 0)&&
                    (status.indexOf(tr_status) >= 0) ){
                      $(this).show();
                    }
            });
          });
      </script>
  </body>
</html>
