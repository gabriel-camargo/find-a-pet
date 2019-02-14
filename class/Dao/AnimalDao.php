<?php

namespace FindAPet\Dao;

use \FindAPet\DB\Sql;
use \FindAPet\Dao;
use \FindAPet\Model\Animal;

class AnimalDao extends Dao
{

    public static function create($obj)
    {
        $sql = new Sql();

        $sql->query("INSERT INTO tbl_animais(
            ani_nome,
            ani_sexo,
            sta_id,
            fai_id,
            por_id,
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
            ":NOME" => $obj->get_ani_nome(),
            ":SEXO" => $obj->get_ani_sexo(),
            ":ANI_STATUS" => $obj->get_sta_id(),
            ":FAIXA_ETARIA" => $obj->get_fai_id(),
            ":PORTE" => $obj->get_por_id(),
            ":INFO" => $obj->get_ani_informacoes(),
            ":USU" => $obj->get_usu_id(),
            ":ESP" => $obj->get_esp_id()
        ));
    }

    public static function find($id)
    {
        $sql = new Sql();

        return $sql->select("SELECT * from tbl_animais where ani_id = :ID", array(
            ":ID"=>$id
        ));
    }

    public static function all()
    {

    }

    public static function update($obj)
    {

    }

    public static function delete($id)
    {

    }

    public function teste(){
        
    }
}