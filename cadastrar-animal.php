<?php
  require_once("config" . DIRECTORY_SEPARATOR . "config.php");
  $user = new Usuario();
  $user->loadById($_SESSION['login']['usu_id']);

  // RECUPERA OS VALORES DO FORMULARIO
  $foto = isset($_POST['foto']) ? $_POST['foto'] : null;
  $raca = isset($_POST['raca']) ? $_POST['raca'] : null;
  $especie = isset($_POST['especie']) ? $_POST['especie'] : null;
  $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
  $faixa = isset($_POST['faixa']) ? $_POST['faixa'] : null;
  $sexo = isset($_POST['sexoRadio']) ? $_POST['sexoRadio'] : null;
  $status = isset($_POST['statusRadio']) ? $_POST['statusRadio'] : null;
  $informacoes = isset($_POST['informacoes']) ? $_POST['informacoes'] : null;
  $usuario = $user->getIdUsuario();


  // SE OS CAMPOS ESTIVEREM COM ALGUM VALOR
  $sql = new Sql();

  $animal = new Animal();

  $animal->setNomeAnimal($nome);
  $animal->setFaixaAnimal($faixa);
  $animal->setSexoAnimal($sexo);
  $animal->setInformacoesAnimal($informacoes);
  $animal->setFotoAnimal($foto);
  $animal->setStatusAnimal($status);
  $animal->setIdUsuario($usuario);
  $animal->setRacaAnimal($raca);
  $animal->setEspecieAnimal($especie);

  $animal->insert();

  echo $animal;

  header('Location: index.php');

 ?>
