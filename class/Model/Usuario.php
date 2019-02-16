<?php

namespace FindAPet\Model;

use \FindAPet\DB\Sql;
use \FindAPet\Model;
use \FindAPet\Helper\MensagemHelper;

class Usuario extends Model
{
    const SESSION = "User";

    public static function verifyLogin()
    {
        if(!Usuario::checkLogin()){
            header("Location: /login/");
            exit;
        }
    }

    public static function verifyLogout()
    {
        if(Usuario::checkLogin()){
            header("Location: /home/");
            exit;
        }
    }

    //Autentica o usuário utilizando email e senha
    public static function autenticar($email, $senha)
    {
        $sql = new Sql();

        $results = $sql->select(
            "SELECT * FROM tbl_usuarios WHERE usu_email = :EMAIL AND usu_senha = :SENHA",array(
            ":EMAIL" => $email,
            ":SENHA" => $senha
        ));

        if (count($results) === 0){
            MensagemHelper::setMensagem("Usuário inexistente ou senha inválida!");
            return false;
        } 

        $usuario = new Usuario();
        $usuario->setData($results[0]);

        $_SESSION[Usuario::SESSION] = $usuario->getValues();

        return true;
    }

    public static function logout(){
        $_SESSION[Usuario::SESSION] = NULL;
    }   

    //Insere um novo usuário no banco de dados e autentica o usuário
    public static function inserir($nome, $email, $senha, $senhaConfirm)
    {

        // SE AS SENHAS INFORMADAS FOREM DIFERENTES
        if ($senha !== $senhaConfirm){
            MensagemHelper::setMensagem("As senhas não correspondem!");
            return false;
        }
        
        // SE ALGUM DOS CAMPOS ESTÃO VAZIOS
        if(
            $nome === "" ||
            $email === "" ||
            $senha === "" 
        ){
            MensagemHelper::setMensagem("Preencha todos os campos!");
            return false;
        }

        //SE O EMAIL INFORMADO JA POSSUI UM CADASTRO
        $results = Usuario::searchEmail($email);
        if(count($results) > 0){
            MensagemHelper::setMensagem("Este email já está cadastrado!");
            return false;
        }

        $usuario = new Usuario();

        $usuario->setData([
            "usu_nome"=>$nome,
            "usu_email"=>$email,
            "usu_senha"=>$senha
        ]);

        $usuario->insert();

        Usuario::autenticar($email, $senha);

        return true;
    }

    //Função para retornar os dados de um usuário da sessão
    public static function loadBySession(){
        $usuario = new Usuario();

        if (isset($_SESSION[Usuario::SESSION]) && (int)$_SESSION[Usuario::SESSION]['usu_id'] > 0) {
			$usuario->setData($_SESSION[Usuario::SESSION]);
        }
        
        return $usuario;
    }

    private static function searchEmail($email)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT *
            from tbl_usuarios
            where usu_email = :EMAIL", array(
                ":EMAIL" => $email
        ));

        return $results;
    }

    //Insere o usuário na tabela
    private function insert(){
        $sql = new Sql();

        $results = $sql->query("INSERT INTO tbl_usuarios(
        usu_nome,
        usu_email,
        usu_senha)
        VALUES(
        :NOME,
        :EMAIL,
        :SENHA)",
        array(
        ":NOME" => $this->get_usu_nome(),
        ":EMAIL" => $this->get_usu_email(),
        ":SENHA" => $this->get_usu_senha()
        ));
    }    

    private static function checkLogin()
    {
        if (
            !isset($_SESSION[Usuario::SESSION])
		    ||
		    !$_SESSION[Usuario::SESSION]
		    ||
		    !(int)$_SESSION[Usuario::SESSION]["usu_id"] > 0
        ) {
            // Não está logado
            return false;
        }

        return true;
    }

    
}