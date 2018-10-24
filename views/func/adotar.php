<?php
  require_once(".." . DIRECTORY_SEPARATOR . "config". DIRECTORY_SEPARATOR . "config.php");
  require_once("check.php");

  $adotador = isset($_POST['adotador']) ? $_POST['adotador'] : null;

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

  $adocao->setIdDoador($user->getIdUsuario());
  $adocao->setIdAdotador($adotador);
  $adocao->setIdAnimal($animal->getIdAnimal());

  $adocao->insert();

  header('Location: ../templates/index.php');
 ?>
