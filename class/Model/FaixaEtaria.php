<?php

namespace FindAPet\Model;

use \FindAPet\DB\Sql;
use \FindAPet\Model;

class FaixaEtaria extends Model
{
    //Lista todas as faixa etárias
    public static function all()
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tbl_faixa_etaria");

        return $results;
    }
}