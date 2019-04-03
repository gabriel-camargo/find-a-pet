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

$app->post('/usuario/configuracoes/confirmar-senha', function(){

    $return['validou'] = false;

	Usuario::verifyLogin();
    $usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

    if($usuario->get_usu_senha() != utf8_decode($_POST['senha'])){
        throw new Exception("Senhas não correspondem!", 1);        
    } else {
        
        $return['validou'] = true;
    }

    echo json_encode($return);
});

$app->post('/usuario/configuracoes/save', function(){

	Usuario::verifyLogin();
    $usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

    $_POST['usu_senha'] = $usuario->get_usu_senha();

    $novoUsuario = new Usuario();
    $novoUsuario->setData($_POST);

    $return['validou'] = $novoUsuario->save();

    $user['nome'] = $novoUsuario->get_usu_nome();
    $user['email']  = $novoUsuario->get_usu_email();
    $user['senha'] = $novoUsuario->get_usu_senha();
    $user['uf'] = $novoUsuario->get_usu_uf();
    $user['cidade'] = $novoUsuario->get_usu_cidade();
    $user['id'] = $novoUsuario->get_usu_id();

    echo json_encode($user);
});

