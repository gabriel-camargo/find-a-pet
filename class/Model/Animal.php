<?php

namespace FindAPet\Model;

use \FindAPet\DB\Sql;
use \FindAPet\Model;
use \FindAPet\Helper\MensagemHelper;

class Animal extends Model
{
    const SESSION = "Animal";
    const SESSION_OLD_POST = "Animal_Old_Post";

    const FAIXA_ETARIA = array(
        "1" => "Filhote",
        "2" => "Comum",
        "3" => "Velho"
    );

    const PORTE = array(
        "1"=> "Pequeno",
        "2"=> "Médio",
        "3"=> "Grande"
    );

    const STATUS_CADASTRO = array(
        "1"=> "Em adoção",
        "2"=> "Perdido"
    );

    public static function inserir($data)
    {
        $data["ani_nome"] = trim($data["ani_nome"]);
        
        //Condições para validar o cadastro
        if (
            $data["ani_nome"] == ""
            ||
            $data["ani_status"] == ""            
            ||
            $data["ani_faixa_etaria"] == ""
            ||
            $data["ani_porte"] == ""
            ||
            $data["esp_id"] == ""
            ||
            !isset($data["ani_sexo"])
        ) {
            Animal::setOldPost($data);
            MensagemHelper::setMensagem("Preencha todos os campos obrigatórios!");
            return false;
        }
        $data["ani_nome"] = utf8_decode($data["ani_nome"]);    
        $data["ani_informacoes"] = trim(utf8_decode($data["ani_informacoes"]));       

        $animal = new Animal();

        $animal->setData($data);

        $animal->insert();

        MensagemHelper::setMensagem("Animal cadastrado com sucesso!");

        return true;
    }

    public function insert()
    {
        $sql = new Sql();

        $results = $sql->query("INSERT INTO tbl_animais(
            ani_nome,
            ani_sexo,
            ani_status,
            ani_faixa_etaria,
            ani_porte,
            ani_informacoes,
            usu_id,
            esp_id
        )
        VALUES(
            :NOME,
            :SEXO,
            :ANI_STATUS,
            :FAIXA_ETARIA,
            :PORTE,
            :INFO,
            :USU,
            :ESP
        )",
        array(
            ":NOME" => $this->get_ani_nome(),
            ":SEXO" => $this->get_ani_sexo(),
            ":ANI_STATUS" => $this->get_ani_status(),
            ":FAIXA_ETARIA" => $this->get_ani_faixa_etaria(),
            ":PORTE" => $this->get_ani_porte(),
            ":INFO" =>$this->get_ani_informacoes(),
            ":USU" => $this->get_usu_id(),
            ":ESP" => $this->get_esp_id()
        ));
    }

    public static function setOldPost($data)
    {
        $_SESSION[Animal::SESSION_OLD_POST] = $data;
    }

    public static function getOldPost()
    {
        $data = (isset($_SESSION[Animal::SESSION_OLD_POST]) &&
            ($_SESSION[Animal::SESSION_OLD_POST])) ? 
            $_SESSION[Animal::SESSION_OLD_POST] :
            "";
        
        Animal::limparOldPost();
        return $data;
    }

    public static function limparOldPost()
    {
        $_SESSION[Animal::SESSION_OLD_POST] = NULL;
    }

    //Carrega os animais que NÃO SÃO do usuario
    public static function pesquisarAnimais($usuario){
    $sql = new Sql();

    return $sql->selectObj(
    "SELECT * FROM cad_animais
    WHERE (usu_id <> :SEARCH) AND (
    (ani_status = 'adocao') OR (ani_status = 'perdido')
    ) ORDER BY ani_id ", array(
    ":SEARCH" => $usuario
    ));
    }
}