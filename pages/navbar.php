<!-- Inicio da navbar superior -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #43A047;">
<!-- <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark"> -->

  <!-- Div com container para deixar os itens mais centralizados -->
  <div class="container">

    <!-- Brand: Título principal -->
    <a class="navbar-brand navbar-link" href="index.php"> <strong> Find a Pet </strong></a>

    <!-- Colapse principal -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerPrincipal" aria-controls="navbarTogglerPrincipal" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Conteudo dentro do colapse principal -->
    <div class="collapse navbar-collapse" id="navbarTogglerPrincipal">

      <!-- Links -->
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item" id="meus_animais">
          <a class="nav-link navbar-link" href="animal.php"> Meus Animais </a>
        </li>
      </ul>

      <!-- Campo de pesquisa -->
      <form action="index.php" class="form-inline my-2 my-lg-0" method="post">
        <!-- <div class="input-group mb-3"> -->
          <input name="nav_nome" type="search" class="form-control form-inline my-2 my-lg-0 navbar-input" id="navbar-input" placeholder="Pesquisar animal...">
          <div class="input-group-append">
            <button class="btn btn-dark" type="submit">@</button>
          </div>
        <!-- </div> -->
      </form>


      <!-- Menu dropdown -->
      <span class="nav-item dropdown my-2 my-lg-0" id="drop">
        <a class="nav-link dropdown-toggle navbar-link" href="#" id="navbar-drop" data-toggle="dropdown">
          <?php echo $user->getApelidoUsuario(); ?>
        </a>
        <div class="dropdown-menu navbar-dropdown" id="menu">
          <img src="<?php echo ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "perfil" . DIRECTORY_SEPARATOR . $user->getIdUsuario() . DIRECTORY_SEPARATOR . $user->getFotoUsuario(); ?>" alt="" height="42" width="42">
          <span class="dropdown-item"><?php echo $user->getNomeUsuario(); ?></span>
          <span class="dropdown-item text-muted" id="nome-usuario"><?php echo $user->getEmailUsuario(); ?></span>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="config-nome.php"> Configurações </a>
          <a class="dropdown-item" href="../func/logout.php"> Logout </a>
        </div>
      </span>
      <!-- Fim do menu dropdown -->


    </div>
    <!-- Fim do colapse principal -->


  </div>
</nav>
<!-- Termino da navbar superior -->
