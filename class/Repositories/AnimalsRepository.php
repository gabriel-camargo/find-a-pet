<?php

namespace FindAPet\Repositories;

use \FindAPet\DB\Sql;
use \FindAPet\Repositories\Contracts\AnimalsRepositoryInterface;

class AnimalsRepository implements AnimalsRepositoryInterface
{
    public function listByUser($user)
    {
        $return = array();
        $sql = new Sql();

        $results = $sql->select(
            "SELECT t1.*, t2.esp_nome
             FROM tbl_animais t1 
             INNER JOIN tbl_especies t2 on (t1.esp_id = t2.esp_id)
             INNER JOIN tbl_status t3 on (t1.sta_id = t3.sta_id)
             WHERE t1.usu_id = :USER AND t3.sta_tipo <> :TIPO", array(
            ":USER" => $user,
            ":TIPO" => "del"
        ));

        foreach($results as $r){
            $r = array_map("utf8_encode", $r);
            

            $r['foto'] = (file_exists(
                $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . 
                "res" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR .
                "animal" . DIRECTORY_SEPARATOR .  $r['ani_id'] . ".png"
            )) ? $r['ani_id'] : "default" ;
            
            array_push($return, $r);
        }

        return $return;
    }

    public function list($user, $filtro, $page, $perPage)
    {
        $return = array();

        $sql = new Sql();

        $page = intVal($page);
        $perPage = intVal($perPage);

        $results = $sql->select(
            "SELECT t1.ani_id AS id, t1.ani_nome AS nome, t1.ani_sexo AS sexo,
            t1.ani_informacoes AS informacoes, t2.sta_nome AS status_animal,
            t3.fai_nome AS faixa_etaria, t4.por_nome AS porte, t5.usu_nome AS usuario, t5.usu_email as dono_email,
            t1.ani_uf as uf, t1.ani_cidade as cidade
            FROM tbl_animais t1 
            INNER JOIN tbl_status t2 ON (t1.sta_id = t2.sta_id)
            INNER JOIN tbl_faixa_etaria t3 ON (t1.fai_id = t3.fai_id)
            INNER JOIN tbl_portes t4 ON ( t1.por_id = t4.por_id )
            INNER JOIN tbl_usuarios t5 ON (t1.usu_id = t5.usu_id)
            WHERE t1.usu_id <> :USUARIO AND t2.sta_tipo = :TIPO $filtro
            ORDER BY t1.ani_id desc
            LIMIT $page, $perPage
            ", array(
                ":USUARIO" => $user,
                ":TIPO" => "cad",
            )
        );

        foreach($results as $r){
            $r = array_map("utf8_encode", $r);

            $r['foto'] = (file_exists(
                $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . 
                "res" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR .
                "animal" . DIRECTORY_SEPARATOR .  $r['id'] . ".png"
            )) ? $r['id'] : "default" ;

            array_push($return, $r);
        }

        return $return;
    }

    public function checkTotal($user, $filter)
    {

        $sql = new Sql();

        $count = $sql->select(
            "SELECT count(1) as count
            FROM tbl_animais t1
            INNER JOIN tbl_status t2 ON (t1.sta_id = t2.sta_id)
            INNER JOIN tbl_faixa_etaria t3 ON (t1.fai_id = t3.fai_id)
            INNER JOIN tbl_portes t4 ON ( t1.por_id = t4.por_id )
            INNER JOIN tbl_usuarios t5 ON (t1.usu_id = t5.usu_id)
            WHERE t1.usu_id <> :USUARIO AND t2.sta_tipo = :TIPO $filter", array(
                "USUARIO" => $user,
                ":TIPO" => "cad"
            )
        );


        return $count;

    }
}
