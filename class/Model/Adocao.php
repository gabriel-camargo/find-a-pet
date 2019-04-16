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

    private function update(){
      
    }
}