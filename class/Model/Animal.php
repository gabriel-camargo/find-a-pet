<?php

namespace FindAPet\Model;

use \FindAPet\DB\Sql;
use \FindAPet\Model;
use \FindAPet\Helper\MensagemHelper;
use \FindAPet\Dao\AnimalDao;

class Animal extends Model
{
    const SESSION = "Animal";

    public function inserir()
    {        
        //Condições para validar o cadastro
        if (
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
        ) {
            $return['cadastrou'] = false;
            return $return;
        }

        $this->set_ani_nome( utf8_decode( $this->get_ani_nome() ));
        $this->set_ani_informacoes( utf8_decode( $this->get_ani_informacoes() )); 

        AnimalDao::create($this);

        $return['cadastrou'] = true;
        $return['lastId'] = Animal::getLastId();        

        MensagemHelper::setMensagem("Animal cadastrado com sucesso!");

        return $return;
    }

    public function loadById($id)
    {
        $results = AnimalDao::find($id);
        
        if (count($results) > 0) {
            $results[0] = array_map("utf8_encode", $results[0]);

            $this->setData($results[0]);
        } else{
            throw new \Exception('Erro ao carregar animal!');  
        }              
    }    

    public static function edit($data)
    {
        $data["ani_nome"] = trim($data["ani_nome"]);

        //Condições para validar o cadastro
        if (
            $data["ani_nome"] == ""
            ||
            $data["sta_id"] == ""            
            ||
            $data["fai_id"] == ""
            ||
            $data["por_id"] == ""
            ||
            $data["esp_id"] == ""
            ||
            $data["ani_sexo"] == ""
        ) {
            MensagemHelper::setMensagem("Campos obrigatórios vazios!");
            $return['cadastrou'] = false;
            return $return;
        }

        $data["ani_nome"] = utf8_decode($data["ani_nome"]);    
        $data["ani_informacoes"] = trim(utf8_decode($data["ani_informacoes"]));  
        
        $animal = new Animal();
        $animal->setData($data);
        $animal->update();

        $return['cadastrou'] = true;

        MensagemHelper::setMensagem("Animal atualizado com sucesso!");
        return $return;
    }

    public static function getLastId()
    {
        $sql = new Sql();

        $results = $sql->select("SELECT max(ani_id) as id FROM tbl_animais");

        return $results[0]['id'];
    }

    public function update(){
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

    public static function savePhoto($base64Image, $imageName)
    {
        $fileName =  $imageName.".png";

        $base64Image = trim($base64Image);
        $base64Image = str_replace('data:image/png;base64,', '', $base64Image);
        $base64Image = str_replace('data:image/jpg;base64,', '', $base64Image);
        $base64Image = str_replace('data:image/jpeg;base64,', '', $base64Image);
        $base64Image = str_replace('data:image/gif;base64,', '', $base64Image);
        $base64Image = str_replace(' ', '+', $base64Image);

        $imageData = base64_decode($base64Image);
        //Set image whole path here 
        $filePath = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . 
            "res" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR .
            "animal" . DIRECTORY_SEPARATOR . $fileName;

        file_put_contents($filePath, $imageData);
    }

    public static function listByUser($userId)
    {
        $return = array();
        $sql = new Sql();

        $results = $sql->select(
            "SELECT t1.*, t2.esp_nome
             FROM tbl_animais t1 
             INNER JOIN tbl_especies t2 on (t1.esp_id = t2.esp_id)
             INNER JOIN tbl_status t3 on (t1.sta_id = t3.sta_id)
             WHERE t1.usu_id = :USER AND t3.sta_tipo <> :TIPO", array(
            ":USER" => $userId,
            ":TIPO" => "del"
        ));

        foreach($results as $r){
            $r = array_map("utf8_encode", $r);
            array_push($return, $r);
        }

        return $return;
    }

    public static function list($user)
    {
        $return = array();

        $sql = new Sql();

        $results = $sql->select(
            "SELECT t1.ani_id AS id, t1.ani_nome AS nome, t1.ani_sexo AS sexo,
            t1.ani_informacoes AS informacoes, t2.sta_nome AS status,
            t3.fai_nome AS faixa_etaria, t4.por_nome AS porte, t5.usu_nome AS usuario
            FROM tbl_animais t1
            INNER JOIN tbl_status t2 ON (t1.sta_id = t2.sta_id)
            INNER JOIN tbl_faixa_etaria t3 ON (t1.fai_id = t3.fai_id)
            INNER JOIN tbl_portes t4 ON ( t1.por_id = t4.por_id )
            INNER JOIN tbl_usuarios t5 ON (t1.usu_id = t5.usu_id)
            WHERE t1.usu_id <> :USUARIO AND t2.sta_tipo = :TIPO", array(
                "USUARIO" => $user,
                ":TIPO" => "cad"
            )
        );

        foreach($results as $r){
            $r = array_map("utf8_encode", $r);
            array_push($return, $r);
        }

        return $return;
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
}