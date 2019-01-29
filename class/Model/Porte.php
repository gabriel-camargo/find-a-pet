<?php

namespace FindAPet\Model;

use \FindAPet\DB\Sql;
use \FindAPet\Model;

class Porte extends Model
{
    //Lista todas os portes
    public static function all()
    {
        $return = array();

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tbl_portes");

        foreach($results as $r){
            $r = array_map("utf8_encode", $r);
            array_push($return, $r);
        }

        return $return;
    }
}