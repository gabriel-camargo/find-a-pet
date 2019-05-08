<?php

namespace FindAPet\Model;

use \FindAPet\DB\Sql;
use \FindAPet\Model;

date_default_timezone_set("America/Sao_Paulo");

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
            sta_id,
            ado_texto,
            usu_id,
            ani_id
        )
        VALUES(
            :STATUS_ADOCAO,
            :TEXTO,
            :USUARIO,
            :ANIMAL
        )",
        array(
            ":STATUS_ADOCAO" => $this->get_sta_id(),
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

    public static function confirmarAdocao($ado_id, $sta_id, $ani_id) 
    {
        $idRejeitado = ($sta_id == '6')? 8: 11;
        try {
            $sql = new Sql();

            $sql->query("UPDATE tbl_adocoes SET 
                sta_id=:STA_ID
                WHERE ani_id=:ID ",
            array(
                ":ID" => $ani_id,
                ":STA_ID" => $idRejeitado
            ));

            $sql->query("UPDATE tbl_adocoes SET 
                sta_id=:STA_ID,
                ado_dt_hr_confirmacao=:DATA_HORA
                WHERE ado_id=:ID ",
            array(
                ":ID" => $ado_id,
                ':STA_ID' => $sta_id,
                ":DATA_HORA" => date("Y-m-d H:i:s")
            ));
            
            return true;
        } catch (Exception $e) {
            return false;
        }
        
    }

    public static function rejeitarAdocao($ado_id, $sta_id) 
    {
        try {
            $sql = new Sql();

            $sql->query("UPDATE tbl_adocoes SET 
                sta_id=:STA_ID,
                ado_dt_hr_confirmacao=:DATA_HORA
                WHERE ado_id=:ID ",
            array(
                ":ID" => $ado_id,
                ":STA_ID" => $sta_id,
                ":DATA_HORA" => date("Y-m-d H:i:s")
            ));
            
            return true;
        } catch (Exception $e) {
            return false;
        }
        
    }
}