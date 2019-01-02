<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title> Find a Pet </title>

  <link rel="stylesheet" href="/res/css/vendor/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="/res/css/vendor/font-awesome/fontawesome-all.css">
  <link rel="stylesheet" href="/res/css/estilo.css">

  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">


</head>

<body>

  <!-- Inicio da navbar superior -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light p-1">
    <!-- <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark"> -->

    <!-- Div com container para deixar os itens mais centralizados -->
    <div class="container-fluid">

      <!-- Brand: Título principal -->
      <a class="navbar-brand navbar-link" href="/login/">
         <span class="navbar-titulo"> Find a Pet </span>
       </a>

      <!-- Colapse principal -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerPrincipal" aria-controls="navbarTogglerPrincipal" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Conteudo dentro do colapse principal -->
      <div class="collapse navbar-collapse" id="navbarTogglerPrincipal">

        <!-- Lista alinhada para a esquerda -->
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item" id="meus_animais">
            <a class="nav-link navbar-link" href="/animais"> Meus Animais </a>
          </li>
        </ul>

        <!-- Lista alinhada para a direita -->
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo htmlspecialchars( $nome, ENT_COMPAT, 'UTF-8', FALSE ); ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/logout/"> Logout </a>
            </div>
          </li>
        </ul>

      </div>
      <!-- Fim do colapse principal -->

    </div>
  </nav>
  <!-- Termino da navbar superior -->
