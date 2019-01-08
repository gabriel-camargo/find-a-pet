<?php

namespace FindAPet\Model;

use \FindAPet\DB\Sql;
use \FindAPet\Model;

class Especie extends Model
{
    //Lista todas as espécies
    public static function listAll()
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tbl_especies");

        return $results;
    }
}