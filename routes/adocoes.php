<?php

use \FindAPet\Page;
use \FindAPet\Model\Usuario;
use \FindAPet\Repositories\AdocoesRepository;

$app->get('/adocoes-perdidos/', function(){	

	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	$adocoesRepository = new AdocoesRepository();
	$adocoesRecentes = $adocoesRepository->recentRequests($usuario->get_usu_id());

	$pedidosAnimais = $adocoesRepository->list($usuario->get_usu_id());

	// VERIFICAR SE IMAGEM EXISTE
	$fotoUsuario = (file_exists(
        $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . 
        "res" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR .
        "perfil" . DIRECTORY_SEPARATOR .  $usuario->get_usu_id() . ".png"
    )) ?"perfil/". $usuario->get_usu_id() . '.png' : "default.png" ;

	$page = new Page();

  	$page->setTpl("adocoes-perdidos", array(
		"adocoesRecentes" => $adocoesRecentes,
		"nome" => $usuario->get_usu_nome(),
		"fotoUsuario" => $fotoUsuario,
		"pedidosAnimais" => $pedidosAnimais
	));
});