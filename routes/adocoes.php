<?php

use \FindAPet\Page;
use \FindAPet\Model\Usuario;
use \FindAPet\Model\Adocao;
use \FindAPet\Model\Animal;
use \FindAPet\Repositories\AdocoesRepository;

$app->get('/adocoes-perdidos/', function(){	
	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$adocoesRepository = new AdocoesRepository();
	$pedidosAnimais = $adocoesRepository->list($usuario->get_usu_id());

	// VERIFICAR SE IMAGEM EXISTE
	$fotoUsuario = (file_exists(
        $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . 
        "res" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR .
        "perfil" . DIRECTORY_SEPARATOR .  $usuario->get_usu_id() . ".png"
    )) ?"perfil/". $usuario->get_usu_id() . '.png' : "default.png" ;

	$page = new Page();

  	$page->setTpl("adocoes-perdidos", array(
		"nome" => $usuario->get_usu_nome(),
		"fotoUsuario" => $fotoUsuario,
		"pedidosAnimais" => $pedidosAnimais
	));
});

$app->get('/adocoes-perdidos/meus-pedidos', function(){	
	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$adocoesRepository = new AdocoesRepository();

	// VERIFICAR SE IMAGEM EXISTE
	$fotoUsuario = (file_exists(
        $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . 
        "res" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR .
        "perfil" . DIRECTORY_SEPARATOR .  $usuario->get_usu_id() . ".png"
	)) ?"perfil/". $usuario->get_usu_id() . '.png' : "default.png" ;
	
	$meusPedidos = $adocoesRepository->myRequests($usuario->get_usu_id());
	
	$page = new Page();

  	$page->setTpl("adocoes-perdidos-meus-pedidos", array(
		"nome" => $usuario->get_usu_nome(),
		"fotoUsuario" => $fotoUsuario,
		"meusPedidosAceitos" => $meusPedidos[0],
		"meusPedidosRejeitados" => $meusPedidos[1],
		"meusPedidosConcluidos" => $meusPedidos[2]
	));
});

$app->post("/adocoes-perdidos/search-requests", function() {
	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);
	
	$adocoesRepository = new AdocoesRepository();
	$requests = $adocoesRepository->listUsers($_POST['ani_id']);

	echo json_encode($requests);
});

$app->post("/adocoes-perdidos/confirmar-adocao", function() {
	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);
	
	$adocao = new Adocao();
	$adocao->loadById($_POST['ado_id']);

	$animal = new Animal();
	$animal->find($adocao->get_ani_id());
	$animal->set_sta_id(2);
	$animal->save();

	$return=array();
	$return['status_adocao']=Adocao::confirmarAdocao($_POST['ado_id'], $adocao->get_ani_id());
	
	echo json_encode($return);
});

$app->post("/adocoes-perdidos/rejeitar-adocao", function() {
	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);
	
	$return=array();
	$return['status_adocao']=Adocao::rejeitarAdocao($_POST['ado_id']);
	
	echo json_encode($return);
});