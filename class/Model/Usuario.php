<?php

namespace FindAPet\Model;

use \FindAPet\DB\Sql;
use \FindAPet\Model;
use \FindAPet\Helper\MensagemHelper;

class Usuario extends Model
{
    const SESSION = "User";

    private function usu_utf8_decode()
    {
        $this->set_usu_nome( trim(utf8_decode( $this->get_usu_nome() )));
        $this->set_usu_email( trim(utf8_decode( $this->get_usu_email() )));
        $this->set_usu_senha( trim(utf8_decode( $this->get_usu_senha() )));  
        $this->set_usu_senha_confirm( trim(utf8_decode( $this->get_usu_senha_confirm() )));    
        $this->set_usu_uf( trim(utf8_decode( $this->get_usu_uf() )));       
        $this->set_usu_cidade( trim(utf8_decode( $this->get_usu_cidade() )));  
    }

    private function usu_utf8_encode()
    {
        $this->set_usu_nome( trim(utf8_encode( $this->get_usu_nome() )));
        $this->set_usu_email( trim(utf8_encode( $this->get_usu_email() )));
        $this->set_usu_senha( trim(utf8_encode( $this->get_usu_senha() )));     
        $this->set_usu_uf( trim(utf8_encode( $this->get_usu_uf() )));       
        $this->set_usu_cidade( trim(utf8_encode( $this->get_usu_cidade() )));  
    }

    public function save()
    {
        $this->usu_utf8_decode();   
               
        if($this->get_usu_id() > 0 && $this->get_usu_id() != NULL){
            $this->update();
        } 
        else{
            if(!$this->checkInsert()) return false;
            $this->insert(); 
            Usuario::autenticar($this->get_usu_email(), $this->get_usu_senha());
        }                

        return true;
    }

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

    //Função para retornar os dados de um usuário da sessão
    public static function loadBySession(){
        $usuario = new Usuario();

        if (isset($_SESSION[Usuario::SESSION]) && (int)$_SESSION[Usuario::SESSION]['usu_id'] > 0) {
            $usuario->setData($_SESSION[Usuario::SESSION]);
            
            $usuario->usu_utf8_encode();
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
        usu_senha,
        usu_uf,
        usu_cidade)
        VALUES(
        :NOME,
        :EMAIL,
        :SENHA,
        :UF,
        :CIDADE)",
        array(
        ":NOME" => $this->get_usu_nome(),
        ":EMAIL" => $this->get_usu_email(),
        ":SENHA" => $this->get_usu_senha(),
        ":UF" => $this->get_usu_uf(),
        ":CIDADE" => $this->get_usu_cidade()
        ));
    }    

    private function update()
    {
        $sql = new Sql();

        $results = $sql->query("UPDATE tbl_usuarios SET 
            usu_nome=:NOME,
            usu_email=:EMAIL,
            usu_senha=:SENHA, 
            usu_uf=:UF,
            usu_cidade=:CIDADE,
            WHERE usu_id=:ID ",
        array(
            ":NOME" => $this->get_usu_nome(),
            ":EMAIL" => $this->get_usu_email(),
            ":SENHA" => $this->get_usu_senha(),
            ":UF" => $this->get_usu_uf(),
            ":CIDADE" => $this->get_usu_cidade(),
            ":ID" => $this->get_usu_id(),
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

    private function checkInsert()
    {
        // SE AS SENHAS INFORMADAS FOREM DIFERENTES
        if (
            $this->get_usu_senha() !== $this->get_usu_senha_confirm()
        ){
            MensagemHelper::setMensagem("As senhas não correspondem!");
            return false;
        }
        
        // SE ALGUM DOS CAMPOS ESTÃO VAZIOS
        if(
            $this->get_usu_nome() === "" ||
            $this->get_usu_email() === "" ||
            $this->get_usu_senha() === "" 
        ){
            MensagemHelper::setMensagem("Preencha todos os campos!");
            return false;
        }

        //SE O EMAIL INFORMADO JA POSSUI UM CADASTRO
        $results = Usuario::searchEmail($this->get_usu_email());
        if(count($results) > 0){
            MensagemHelper::setMensagem("Este email já está cadastrado!");
            return false;
        }

        return true;
    }    
}