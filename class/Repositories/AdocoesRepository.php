<?php

namespace FindAPet\Repositories;

use \FindAPet\DB\Sql;
use \FindAPet\Repositories\Contracts\AdocoesRepositoryInterface;

date_default_timezone_set('America/Sao_Paulo');

class AdocoesRepository implements AdocoesRepositoryInterface
{
    public function list($owner)
    {
        $return = array();

        $sql = new Sql();

        $results = $sql->select(
            "SELECT an.ani_id, an.ani_nome, st.sta_nome, MAX( ad.ado_dt_hr ) AS ado_dt_hr
            FROM tbl_adocoes ad
            INNER JOIN tbl_animais an ON ad.ani_id = an.ani_id
            INNER JOIN tbl_status st ON st.sta_id = an.sta_id
            WHERE an.usu_id = :PET_OWNER
            GROUP BY ani_id
            ORDER BY ado_dt_hr desc", array(
                ":PET_OWNER" => $owner
        ));

        $horaAtual = strtotime("now"); 

        foreach($results as $r) {

            $horaAdocao = strtotime($r['ado_dt_hr']);  

            $diff = abs($horaAtual - $horaAdocao);  

            $r = array_map("utf8_encode", $r);           

            $r['foto'] = (file_exists(
                $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . 
                "res" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR .
                "animal" . DIRECTORY_SEPARATOR .  $r['ani_id'] . ".png"
            )) ?"animal/". $r['ani_id'] . '.png' : "default.png" ;

            $r['hora_atual'] = $horaAtual;

            $r['diferenca_ano'] = floor($diff / (365*60*60*24));  

            $r['diferenca_mes'] = floor(($diff - $r['diferenca_ano'] * 365*60*60*24) 
            / (30*60*60*24));

            $r['diferenca_dias'] = 
                $days = floor(($diff - $r['diferenca_ano'] * 365*60*60*24 -  
                $r['diferenca_mes']*30*60*60*24)/ (60*60*24)); 

            $r['diferenca_horas'] = floor(($diff - $r['diferenca_ano'] * 365*60*60*24  
                - $r['diferenca_mes']*30*60*60*24 - $r['diferenca_dias']*60*60*24) / (60*60));
            
            $r['diferenca_minutos'] = floor(($diff - $r['diferenca_ano'] * 365*60*60*24  
                - $r['diferenca_mes']*30*60*60*24 - $r['diferenca_dias']*60*60*24  
                - $r['diferenca_horas']*60*60)/ 60);
            
            $r['diferenca_segundos'] = floor(($diff - $r['diferenca_ano'] * 365*60*60*24  
                - $r['diferenca_mes']*30*60*60*24 - $r['diferenca_dias']*60*60*24 
                - $r['diferenca_horas']*60*60 - $r['diferenca_minutos']*60));
                
            $r['diferenca_string'] = $r['diferenca_segundos'] . ' seg';
            $r['diferenca_string'] = ($r['diferenca_minutos'] != '0')? ($r['diferenca_minutos'] . ' min'): $r['diferenca_string'];
            $r['diferenca_string'] = ($r['diferenca_horas'] != '0')? ($r['diferenca_horas'] . ' hrs'): $r['diferenca_string'];
            $r['diferenca_string'] = ($r['diferenca_dias'] != '0')? ($r['diferenca_dias'] . ' d'): $r['diferenca_string'];
            $r['diferenca_string'] = ($r['diferenca_mes'] != '0')? ($r['diferenca_mes'] . ' m'): $r['diferenca_string'];
            $r['diferenca_string'] = ($r['diferenca_ano'] != '0')? ($r['diferenca_ano'] . ' a'): $r['diferenca_string'];
            
            array_push($return, $r);
        }

        return $return;
    }

    public function listUsers($animal)
    {
        $return = array();

        $sql = new Sql();

        $results = $sql->select(
            "SELECT ad.usu_id, ad.ado_id, ad.ado_dt_hr, us.usu_nome, us.usu_email, ad.ado_texto, an.ani_nome
            FROM tbl_adocoes ad
            INNER JOIN tbl_usuarios us ON (ad.usu_id = us.usu_id)
            INNER JOIN tbl_animais an ON (ad.ani_id = an.ani_id)
            WHERE ad.ani_id = :ANIMAL AND ad.ado_status = :ADO_STATUS
            ORDER BY ad.ado_dt_hr desc", array(
                ":ANIMAL" => $animal,
                ":ADO_STATUS" => '6'
        ));

        $horaAtual = strtotime("now"); 

        foreach($results as $r){

            $horaAdocao = strtotime($r['ado_dt_hr']);  
            $diff = abs($horaAtual - $horaAdocao);  

            $r = array_map("utf8_encode", $r);           

            $r['foto'] = (file_exists(
                $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . 
                "res" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR .
                "perfil" . DIRECTORY_SEPARATOR .  $r['usu_id'] . ".png"
            )) ?"perfil/". $r['usu_id'] . '.png' : "default.png" ;

            $r['diferenca_ano'] = floor($diff / (365*60*60*24));  

            $r['diferenca_mes'] = floor(($diff - $r['diferenca_ano'] * 365*60*60*24) 
            / (30*60*60*24));

            $r['diferenca_dias'] = 
                $days = floor(($diff - $r['diferenca_ano'] * 365*60*60*24 -  
                $r['diferenca_mes']*30*60*60*24)/ (60*60*24)); 

            $r['diferenca_horas'] = floor(($diff - $r['diferenca_ano'] * 365*60*60*24  
                - $r['diferenca_mes']*30*60*60*24 - $r['diferenca_dias']*60*60*24) / (60*60));
            
            $r['diferenca_minutos'] = floor(($diff - $r['diferenca_ano'] * 365*60*60*24  
                - $r['diferenca_mes']*30*60*60*24 - $r['diferenca_dias']*60*60*24  
                - $r['diferenca_horas']*60*60)/ 60);
            
            $r['diferenca_segundos'] = floor(($diff - $r['diferenca_ano'] * 365*60*60*24  
                - $r['diferenca_mes']*30*60*60*24 - $r['diferenca_dias']*60*60*24 
                - $r['diferenca_horas']*60*60 - $r['diferenca_minutos']*60));
                
            $r['diferenca_string'] = $r['diferenca_segundos'] . ' seg';
            $r['diferenca_string'] = ($r['diferenca_minutos'] != '0')? ($r['diferenca_minutos'] . ' min'): $r['diferenca_string'];
            $r['diferenca_string'] = ($r['diferenca_horas'] != '0')? ($r['diferenca_horas'] . ' hrs'): $r['diferenca_string'];
            $r['diferenca_string'] = ($r['diferenca_dias'] != '0')? ($r['diferenca_dias'] . ' d'): $r['diferenca_string'];
            $r['diferenca_string'] = ($r['diferenca_mes'] != '0')? ($r['diferenca_mes'] . ' m'): $r['diferenca_string'];
            $r['diferenca_string'] = ($r['diferenca_ano'] != '0')? ($r['diferenca_ano'] . ' a'): $r['diferenca_string'];
            
            array_push($return, $r);
        }

        return $return;
    }

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
