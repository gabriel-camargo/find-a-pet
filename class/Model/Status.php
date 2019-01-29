<?php

namespace FindAPet\Model;

use \FindAPet\DB\Sql;
use \FindAPet\Model;

class Status extends Model
{
    //Lista todas os status
    public static function all()
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tbl_status");

        return $results;
    }

    //Seleciona os status de um tipo específico
    public static function find($tipo)
    {
        $return = array();

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tbl_status WHERE sta_tipo = :TIPO", array(
            ":TIPO" => $tipo
        ));

        foreach($results as $r){
            $r = array_map("utf8_encode", $r);
            array_push($return, $r);
        }
        
        return $return;
    }
}