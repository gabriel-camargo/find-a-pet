<!-- Inicio da navbar superior -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #43A047;">
<!-- <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark"> -->

  <!-- Div com container para deixar os itens mais centralizados -->
  <div class="container">

    <!-- Brand: Título principal -->
    <a class="navbar-brand" href="#"> <strong> Find a Pet </strong></a>

    <!-- Colapse principal -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerPrincipal" aria-controls="navbarTogglerPrincipal" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Conteudo dentro do colapse principal -->
    <div class="collapse navbar-collapse" id="navbarTogglerPrincipal">

      <!-- Links -->
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item" id="meus_animais">
          <a class="nav-link" href="#"> Animais </a>
        </li>
      </ul>

      <!-- Campo de pesquisa -->
      <form class="form-inline my-2 my-lg-0">
        <div class="input-group mb-3 " id="div-pesquisa">
          <input type="search" class="form-control" placeholder="Pesquisar animal..." id="nav-input">
          <div class="input-group-append">
            <button class="btn btn-dark" type="button">@</button>

          </div>
        </div>
      </form>


      <!-- Menu dropdown -->
      <span class="nav-item dropdown my-2 my-lg-0" id="drop">
        <a class="nav-link dropdown-toggle" href="#" id="navbar-drop" data-toggle="dropdown">
          Minha Conta
        </a>
        <div class="dropdown-menu" id="menu">
          <a class="dropdown-item" href="#">Fulano da Silva</a>
          <a class="dropdown-item text-muted" href="#" id="nome-usuario">fulanodasilva@email.com</a>
          <button type="button" class="btn btn-info ">Atualizar Dados</button> <br>
          <button type="button" class="btn btn-danger ">Encerrar Seção</button>
        </div>
      </span>
      <!-- Fim do menu dropdown -->


    </div>
    <!-- Fim do colapse principal -->


  </div>
</nav>
<!-- Termino da navbar superior -->
