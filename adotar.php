<?php
  require_once("config". DIRECTORY_SEPARATOR . "config.php");
  require_once("check.php");

  $user = new Usuario();
  $user->loadById($_SESSION['login']['usu_id']);

  $animal = new Animal();
  $animal->loadById($_SESSION['login']['ani_id']);

  if ($animal->getStatusAnimal() == 'perdido') {
    $animal->updateStatus('encontrado');
    echo "encontrou";
  }
  else if ($animal->getStatusAnimal() == 'adocao') {
    $animal->updateStatus('adotado');
    echo "adotou";
  }
  else {
    echo "caiu aqui";
    // header('Location: index.php');
  }

  $adocao = new Adocao();

  $adocao->setIdDoador($animal->getIdUsuario());
  $adocao->setIdAdotador($user->getIdUsuario());
  $adocao->setIdAnimal($animal->getIdAnimal());

  $adocao->insert();

  header('Location: index.php');
 ?>
