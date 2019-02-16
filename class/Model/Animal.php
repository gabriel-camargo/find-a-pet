<?php

namespace FindAPet\Model;

use \FindAPet\DB\Sql;
use \FindAPet\Model;
use \FindAPet\Helper\MensagemHelper;

class Animal extends Model
{
    const SESSION = "Animal";

    public function save()
    {
        if(!$this->check())
        {   
            $return['cadastrou'] = false;
            return $return;
        }

        $this->set_ani_nome( utf8_decode( $this->get_ani_nome() ));
        $this->set_ani_informacoes( utf8_decode( $this->get_ani_informacoes() )); 

        // AnimalDao::create($this); 
        
        if($this->get_ani_id() > 0 && $this->get_ani_id() != NULL) $this->update();
        else $this->insert();        

        MensagemHelper::setMensagem("Animal cadastrado com sucesso!");

        $return['cadastrou'] = true;
        $return['lastId'] = Animal::getLastId(); 
        return $return;
    }

    public function find($id)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * from tbl_animais where ani_id = :ID", array(
            ":ID"=>$id
        ));
        
        if (count($results) > 0) {
            $results[0] = array_map("utf8_encode", $results[0]);

            $this->setData($results[0]);
        } else{
            throw new \Exception('Erro ao carregar animal!');  
        }              
    }

    public static function delete($id)
    {
        $sql = new Sql();

        $sql->query(
            "UPDATE tbl_animais
            SET `sta_id` = 5
            WHERE `ani_id` = :ID",
            array(
                ":ID" => $id
            )
        );
    }

    private static function getLastId()
    {
        $sql = new Sql();

        $results = $sql->select("SELECT max(ani_id) as id FROM tbl_animais");

        return $results[0]['id'];
    }

    private function insert()
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
            ":NOME" => $this->get_ani_nome(),
            ":SEXO" => $this->get_ani_sexo(),
            ":ANI_STATUS" => $this->get_sta_id(),
            ":FAIXA_ETARIA" => $this->get_fai_id(),
            ":PORTE" => $this->get_por_id(),
            ":INFO" => $this->get_ani_informacoes(),
            ":USU" => $this->get_usu_id(),
            ":ESP" => $this->get_esp_id()
        ));
    }

    private function update(){
        $sql = new Sql();

        $results = $sql->query("UPDATE tbl_animais SET 
            ani_nome=:NOME,
            ani_sexo=:SEXO,
            sta_id=:ANI_STATUS, 
            fai_id=:FAIXA_ETARIA,
            por_id=:PORTE,
            ani_informacoes=:INFO,
            esp_id=:ESP
            WHERE ani_id=:ID ",
        array(
            ":NOME" => $this->get_ani_nome(),
            ":SEXO" => $this->get_ani_sexo(),
            ":ANI_STATUS" => $this->get_sta_id(),
            ":FAIXA_ETARIA" => $this->get_fai_id(),
            ":PORTE" => $this->get_por_id(),
            ":INFO" =>$this->get_ani_informacoes(),
            ":ID" => $this->get_ani_id(),
            ":ESP" => $this->get_esp_id()
        ));
    }

    private function check()
    {
        if(
            trim($this->get_ani_nome()) == ""
            ||
            $this->get_sta_id() == ""            
            ||
            $this->get_fai_id() == ""
            ||
            $this->get_por_id() == ""
            ||
            $this->get_esp_id() == ""
            ||
            $this->get_ani_sexo() == ""
        )
        {
            return false;
        }

        return true;
    }
}