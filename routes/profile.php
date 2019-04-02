<?php

use \FindAPet\Page;
use \FindAPet\Model\Usuario;

$app->get('/usuario/configuracoes', function(){

	Usuario::verifyLogin();
    $usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

    $ufPadrao = ($usuario->get_usu_uf() != "") ? $usuario->get_usu_uf() : null;
	$cidadePadrao = ($usuario->get_usu_cidade() != "") ? $usuario->get_usu_cidade() : null;

	$page = new Page();

	$page->setTpl("usuario-update", array(
        "nome" => $usuario->get_usu_nome(),
        "usuario" => $usuario,
        "uf" => $ufPadrao,
		"cidade" => $cidadePadrao
    ));
});