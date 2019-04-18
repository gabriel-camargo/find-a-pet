<?php

namespace FindAPet\Repositories;

use \FindAPet\DB\Sql;
use \FindAPet\Repositories\Contracts\AdocoesRepositoryInterface;

class AdocoesRepository implements AdocoesRepositoryInterface
{
    public function recentRequests($owner)
    {

        $return = array();

        $sql = new Sql();

        $results = $sql->select(
            "SELECT an.usu_id AS dono, an.ani_nome AS animal, 
            us.usu_id as interessado_id, us.usu_nome AS interessado
            FROM tbl_adocoes ad
            INNER JOIN tbl_animais an ON ad.ani_id = an.ani_id
            INNER JOIN tbl_usuarios us ON ad.usu_id = us.usu_id
            WHERE an.usu_id = :PET_OWNER
            ORDER BY ado_dt_hr DESC
            LIMIT 0, 3", array(
                "PET_OWNER" => $owner
        ));

        foreach($results as $r){
            $r = array_map("utf8_encode", $r);           

            $r['foto'] = (file_exists(
                $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . 
                "res" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR .
                "perfil" . DIRECTORY_SEPARATOR .  $r['interessado_id'] . ".png"
            )) ?"perfil/". $r['interessado_id'] . '.png' : "default.png" ;
            
            array_push($return, $r);
        }

        return $return;
    }
}
