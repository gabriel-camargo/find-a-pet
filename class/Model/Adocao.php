<?php

namespace FindAPet\Model;

use \FindAPet\DB\Sql;
use \FindAPet\Model;

class Adocao extends Model
{
    const SESSION = "Adocao";

    public function save()
    {    
        $this->set_ado_texto(utf8_decode($this->get_ado_texto()));
        if($this->get_ado_id() > 0 && $this->get_ado_id() != NULL) $this->update();

        else $this->insert();
    }

    private function insert()
    {
        $sql = new Sql();

        $sql->query("INSERT INTO tbl_adocoes(
            ado_status,
            ado_texto,
            usu_id,
            ani_id
        )
        VALUES(
            :ADO_STATUS,
            :TEXTO,
            :USUARIO,
            :ANIMAL
        )",
        array(
            ":ADO_STATUS" => $this->get_ado_status(),
            ":TEXTO" => $this->get_ado_texto(),
            ":USUARIO" => $this->get_usu_id(),
            ":ANIMAL" => $this->get_ani_id()
        ));
    }

    public function loadById($ado_id) 
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * from tbl_adocoes where ado_id = :ID", array(
            ":ID"=>$ado_id
        ));
        
        if (count($results) > 0) {
            $results[0] = array_map("utf8_encode", $results[0]);

            $this->setData($results[0]);
        } else{
            throw new \Exception('Erro ao carregar informações!');  
        } 
    }

    public static function confirmarAdocao($ado_id) 
    {
        try {
            $sql = new Sql();

            $sql->query("UPDATE tbl_adocoes SET 
                ado_status=7
                WHERE ado_id=:ID ",
            array(
                ":ID" => $ado_id,
            ));

            return true;
        } catch (Exception $e) {
            return false;
        }
        
    }
}