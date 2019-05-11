<?php

use \FindAPet\Page;
use \FindAPet\Model\Usuario;
use \FindAPet\Helper\ImageHelper;
use \FindAPet\Repositories\AdocoesRepository;

$app->get('/usuario/configuracoes', function(){

	Usuario::verifyLogin();
    $usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

    // VERIFICAR SE IMAGEM EXISTE
	$fotoUsuario = (file_exists(
        $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . 
        "res" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR .
        "perfil" . DIRECTORY_SEPARATOR .  $usuario->get_usu_id() . ".png"
    )) ?"perfil/". $usuario->get_usu_id() . '.png' : "default.png" ;

    $ufPadrao = ($usuario->get_usu_uf() != "") ? $usuario->get_usu_uf() : null;
	$cidadePadrao = ($usuario->get_usu_cidade() != "") ? $usuario->get_usu_cidade() : null;

	$page = new Page();

	$page->setTpl("usuario-update", array(
        "nome" => $usuario->get_usu_nome(),
        "usuario" => $usuario,
        "uf" => $ufPadrao,
        "cidade" => $cidadePadrao,
        "fotoUsuario" => $fotoUsuario
    ));
});

$app->post('/usuario/configuracoes/confirmar-senha', function(){

    $return['validou'] = false;

	Usuario::verifyLogin();
    $usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

    if($usuario->get_usu_senha() != $_POST['senha']){
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

    echo json_encode($return);
});

$app->post('/usuario/configuracoes/alterar-senha', function(){

	Usuario::verifyLogin();
    $usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);
    
    $usuario->set_usu_senha($_POST['senha']);

    $return['validou'] = $usuario->save();

    echo json_encode($return);
});

$app->post("/usuario/configuracoes/savePhoto", function(){

	Usuario::verifyLogin();
	$usuario = Usuario::loadBySession($_SESSION[Usuario::SESSION]);

	ImageHelper::savePhoto($_POST["image"], $_POST['id'], "perfil");

});