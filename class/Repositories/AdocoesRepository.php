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
            "SELECT an.ani_id, an.ani_nome, st.sta_nome, MAX( ad.ado_dt_hr_insert ) AS ado_dt_hr_insert
            FROM tbl_adocoes ad
            INNER JOIN tbl_animais an ON ad.ani_id = an.ani_id
            INNER JOIN tbl_status st ON st.sta_id = an.sta_id
            WHERE an.usu_id = :PET_OWNER and ad.sta_id = 4
            GROUP BY ani_id
            ORDER BY ado_dt_hr_insert desc", array(
                ":PET_OWNER" => $owner
        ));

        $horaAtual = strtotime("now"); 

        foreach($results as $r) {

            $horaAdocao = strtotime($r['ado_dt_hr_insert']);  

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
            "SELECT ad.usu_id, ad.ado_id, ad.ado_dt_hr_insert, us.usu_nome, us.usu_email, ad.ado_texto, an.ani_nome, ad.sta_id
            FROM tbl_adocoes ad
            INNER JOIN tbl_usuarios us ON (ad.usu_id = us.usu_id)
            INNER JOIN tbl_animais an ON (ad.ani_id = an.ani_id)
            WHERE ad.ani_id = :ANIMAL AND ad.sta_id = 4
            ORDER BY ad.ado_dt_hr_insert desc", array(
                ":ANIMAL" => $animal
        ));

        $horaAtual = strtotime("now"); 

        foreach($results as $r){

            $horaAdocao = strtotime($r['ado_dt_hr_insert']);  
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

    public function myRequests($usu_id)
    {
        $return = array();

        $sql = new Sql();

        $results = $sql->select(
            "SELECT ad.ado_id, ad.ani_id, an.ani_nome, us.usu_nome, 
            ad.ado_dt_hr_insert, ad.ado_dt_hr_confirmacao, ad.sta_id, st.sta_nome
            FROM tbl_adocoes ad 
            INNER JOIN tbl_animais an ON ad.ani_id = an.ani_id 
            INNER JOIN tbl_usuarios us ON an.usu_id = us.usu_id 
            INNER JOIN tbl_status st ON ad.sta_id = st.sta_id
            WHERE ad.usu_id = :USU_ID AND st.sta_tipo = :TIPO_STATUS
            ORDER BY st.sta_id", array(
                ":USU_ID"=>$usu_id,
                ":TIPO_STATUS"=>'adocao'
        ));

        $arrayEmAberto = array();
        $arrayRejeitado = array();
        $arrayConcluido = array();

        foreach($results as $r){
            $r = array_map("utf8_encode", $r);           

            $r['foto'] = (file_exists(
                $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . 
                "res" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR .
                "animal" . DIRECTORY_SEPARATOR .  $r['ani_id'] . ".png"
            )) ?"animal/". $r['ani_id'] . '.png' : "default.png" ;
            
            switch ($r['sta_id']) {
                case 4:
                    array_push($arrayEmAberto, $r);
                    break;

                case 5:
                    array_push($arrayConcluido, $r);
                    break;

                case 6:
                    array_push($arrayRejeitado, $r);
                    break;  
            }            
        }

        array_push($return, $arrayEmAberto);
        array_push($return, $arrayRejeitado);
        array_push($return, $arrayConcluido);        

        return $return;
    }
}