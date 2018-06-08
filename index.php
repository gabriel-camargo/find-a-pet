<?php
  // session_start();
  require_once("config". DIRECTORY_SEPARATOR . "config.php");
  require_once("check.php");

  $user = new Usuario();
  $user->loadById($_SESSION['login']['usu_id']);
 ?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>

    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'header.php');
     ?>
     <link rel="stylesheet" href="css/sidebar.css">

  </head>
  <body>
    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'navbar.php');
     ?>

     <div class="row" id="body-row">

       <!-- INICIO DA BARRA LATERAL -->
      <div id="sidebar-container" class="sidebar-expanded d-none d-md-block col-2">

	        <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
	        <!-- Bootstrap List Group -->
        <ul class="list-group sticky-top sticky-offset">

	            <!-- Separator with title -->
	            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
	                <small>FILTRO DE PESQUISAS</small>
	            </li>
	            <!-- /END Separator -->

	           <!-- Menu with submenu -->
	           <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                   	<div class="d-flex w-100 justify-content-start align-items-center">

                     	<span class="fa fa-dashboard fa-fw mr-3"></span>
  	                	<span class="menu-collapsed">Espécies</span>
  	                	<span class="submenu-icon ml-auto"></span>

           	      </div>
	           </a>

	           <!-- Submenu content -->
             <div id="submenu1" class="collapse sidebar-submenu">
               <a href="#submenuCachorro" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                       <div class="d-flex w-100 justify-content-start align-items-center">

                         <span class="fa fa-dashboard fa-fw mr-3"></span>
                       <span class="menu-collapsed">Cachorro</span>
                       <span class="submenu-icon ml-auto"></span>

                     </div>
              </a>
              <div id="submenuCachorro" class="collapse sidebar-submenu">

                  <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                      <span class="menu-collapsed">Viralata</span>
                  </a>

                  <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Dalmata</span>
                  </a>
              </div>

              <a href="#submenuGato" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                      <div class="d-flex w-100 justify-content-start align-items-center">

                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                      <span class="menu-collapsed">Gato</span>
                      <span class="submenu-icon ml-auto"></span>

                    </div>
             </a>
             <div id="submenuGato" class="collapse sidebar-submenu">

                 <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                     <span class="menu-collapsed">Viralata de Gato</span>
                 </a>

                 <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                       <span class="menu-collapsed">Alguma raça de gato</span>
                 </a>
             </div>


	            </div>


            <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
	            	<div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
		                <span class="menu-collapsed">Sexo</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
	          </a>

            <!-- Submenu content -->
	          <div id="submenu2" class="collapse sidebar-submenu">

                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Macho</span>
	              </a>

	              <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
	                    <span class="menu-collapsed">Fêmea</span>
                </a>
            </div>

            <a href="#submenu3" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
	            	<div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
		                <span class="menu-collapsed">Status</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
	          </a>

            <!-- Submenu content -->
	          <div id="submenu3" class="collapse sidebar-submenu">

                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Em adoção</span>
	              </a>

	              <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
	                    <span class="menu-collapsed">Perdido</span>
                </a>
            </div>

            <a href="#submenu4" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
	            	<div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
		                <span class="menu-collapsed">Faixa etária</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
	          </a>

            <!-- Submenu content -->
	          <div id="submenu4" class="collapse sidebar-submenu">

                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Filhote</span>
	              </a>

                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
	                    <span class="menu-collapsed">Normal</span>
                </a>

                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
	                    <span class="menu-collapsed">Velho</span>
                </a>
            </div>            

            <!-- Logo -->
	            <li class="list-group-item logo-separator d-flex justify-content-center">
                <img src="https://v4-alpha.getbootstrap.com/assets/brand/bootstrap-solid.svg" width="30" height="30">
             </li>
        </ul>
	      <!-- List Group END-->
	    </div>
	    <!-- FIM DA BARRA LATERAL -->

    <!-- INICIO DA DIV DE PUBLICAÇÕES -->
    <div class="col py-3">
      <?php
      $animais = Animal::pesquisarAnimais($user->getIdUsuario());

      foreach ($animais as $row) {
        echo "<div class=\"animal-publicacao row\">" .
               "<div class=\"col-xs-3 animal-foto\">" .
                 "Foto" .
               "</div>" .
               "<div class=\"col-xs-9 animal-info\">" .
                 "<form class=\"\" action=\"info-animais.php\" method=\"post\">" .
                   "<input type=\"hidden\" name=\"id\" value=" . $row['ani_id'] . ">" .
                   "<button type=\"submit\" name=\"button\">" . $row['ani_nome'] . "</button>" .
                 "</form>" .
                 "<span>" . $row['ani_faixa_etaria'] . "</span> <br>" .
                 "<span>" . $row['ani_raca'] . "</span> <br>" .
                 "<span>" . $row['ani_sexo'] . "</span> <br>" .
                 "<span>" . $row['ani_status'] . "</span> <br>" . "</div></div>" ;
      }
      ?>


    </div>
    <!-- FIM DA DIV DE PUBLICAÇÕES-->

</div>
<!-- body-row END -->

     <?php
       require_once('pages' . DIRECTORY_SEPARATOR . 'codigos-js.php');
      ?>
      <script type="text/javascript">
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
      </script>
  </body>
</html>
