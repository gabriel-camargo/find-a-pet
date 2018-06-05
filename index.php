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
     <link rel="stylesheet" href="css/index.css">

  </head>
  <body>
    <?php
      require_once('pages' . DIRECTORY_SEPARATOR . 'navbar.php');
     ?>

     <!-- Bootstrap row -->

	<div class="row" id="body-row">

    <!-- Sidebar -->

    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block col-2">

	        <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->

	        <!-- Bootstrap List Group -->

        <ul class="list-group sticky-top sticky-offset">

	            <!-- Separator with title -->
	            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">

	                <small>MAIN MENU</small>

	            </li>

	            <!-- /END Separator -->

	           <!-- Menu with submenu -->

	           <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                   	<div class="d-flex w-100 justify-content-start align-items-center">

                   		<span class="fa fa-dashboard fa-fw mr-3"></span>

	                	<span class="menu-collapsed">Dashboard</span>

	                	<span class="submenu-icon ml-auto"></span>

           	</div>

	           </a>


	           <!-- Submenu content -->

           <div id="submenu1" class="collapse sidebar-submenu">

	                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">

                    <span class="menu-collapsed">Charts</span>

                </a>

                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">

                    <span class="menu-collapsed">Reports</span>

                </a>

	                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">

	                    <span class="menu-collapsed">Tables</span>

	                </a>

	            </div>


            <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
	            	<div class="d-flex w-100 justify-content-start align-items-center">

                    		<span class="fa fa-user fa-fw mr-3"></span>

		                <span class="menu-collapsed">Profile</span>

                <span class="submenu-icon ml-auto"></span>

                </div>

	            </a>


            <!-- Submenu content -->

	            <div id="submenu2" class="collapse sidebar-submenu">

                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">

                    <span class="menu-collapsed">Settings</span>

	                </a>

	                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">

	                    <span class="menu-collapsed">Password</span>

                </a>

            </div>


            <a href="#" class="bg-dark list-group-item list-group-item-action">
	            	<div class="d-flex w-100 justify-content-start align-items-center">

            	        <span class="fa fa-tasks fa-fw mr-3"></span>

	            	        <span class="menu-collapsed">Tasks</span>

	            	</div>

            </a>


	            <!-- Separator with title -->

            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">

                <small>OPTIONS</small>

            </li>

            <!-- /END Separator -->


            <a href="#" class="bg-dark list-group-item list-group-item-action">

                <div class="d-flex w-100 justify-content-start align-items-center">

	                    <span class="fa fa-calendar fa-fw mr-3"></span>

                    <span class="menu-collapsed">Calendar</span>

	                </div>

            </a>

            <a href="#" class="bg-dark list-group-item list-group-item-action">

                <div class="d-flex w-100 justify-content-start align-items-center">

	                    <span class="fa fa-envelope-o fa-fw mr-3"></span>

                    <span class="menu-collapsed">Messages <span class="badge badge-pill badge-primary ml-2">5</span></span>

	                </div>

            </a>


            <!-- Separator without title -->

            <li class="list-group-item sidebar-separator menu-collapsed"></li>

            <!-- /END Separator -->

            <a href="#" class="bg-dark list-group-item list-group-item-action">

                <div class="d-flex w-100 justify-content-start align-items-center">

                    <span class="fa fa-question fa-fw mr-3"></span>

	                    <span class="menu-collapsed">Help</span>

                </div>

            </a>

            <a href="#" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">

                <div class="d-flex w-100 justify-content-start align-items-center">

	                    <span id="collapse-icon" class="fa fa-2x mr-3"></span>

                    <span id="collapse-text" class="menu-collapsed">Collapse</span>

                </div>

            </a>

            <!-- Logo -->

	            <li class="list-group-item logo-separator d-flex justify-content-center">

                <img src="https://v4-alpha.getbootstrap.com/assets/brand/bootstrap-solid.svg" width="30" height="30">

            </li>

        </ul>

	        <!-- List Group END-->

	    </div>

	    <!-- sidebar-container END -->



    <!-- MAIN -->

    <div class="col py-3">


	        <h1>Collapsing Menu

	            <small class="text-muted">Version 2.1</small>

	        </h1>



	        <div class="card">

            <h4 class="card-header">Requirements</h4>

            <div class="card-body">

    	<ul>

        	<li>JQuery</li>

             	<li>Bootstrap 4 beta-3</li>

            </ul>

       	    </div>

	        </div>


        <hr>


	        <p>Sriracha biodiesel taxidermy organic post-ironic, Intelligentsia salvia mustache 90's code editing brunch. Butcher polaroid VHS art party, hashtag Brooklyn deep v PBR narwhal sustainable mixtape swag wolf squid tote bag. Tote bag cronut semiotics,
            raw denim deep v taxidermy messenger bag. Tofu YOLO Etsy, direct trade ethical Odd Future jean shorts paleo. Forage Shoreditch tousled aesthetic irony, street art organic Bushwick artisan cliche semiotics ugh synth chillwave meditation. Shabby
            chic lomo plaid vinyl chambray Vice. Vice sustainable cardigan, Williamsburg master cleanse hella DIY 90's blog.</p>

        <hr>

        <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade
            disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi McSweeney's Shoreditch selfies, forage fingerstache
            food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>

        <hr>

        <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade
            disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi McSweeney's Shoreditch selfies, forage fingerstache
            food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>

        <hr>

        <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade
            disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi McSweeney's Shoreditch selfies, forage fingerstache
            food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>

        <hr>

        <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade
            disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi McSweeney's Shoreditch selfies, forage fingerstache
            food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>

        <hr>

        <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade
            disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi McSweeney's Shoreditch selfies, forage fingerstache
            food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>

        <hr>

        <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade
            disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi McSweeney's Shoreditch selfies, forage fingerstache
            food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>



    	   </div>

    <!-- Main Col END -->


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
