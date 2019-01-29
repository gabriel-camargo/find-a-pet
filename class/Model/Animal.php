<?php

namespace FindAPet\Model;

use \FindAPet\DB\Sql;
use \FindAPet\Model;
use \FindAPet\Helper\MensagemHelper;

class Animal extends Model
{
    const SESSION = "Animal";

    public static function searchById($id)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * from tbl_animais where ani_id = :ID", array(
            ":ID"=>$id
        ));
        
        if (count($results) > 0) {
            $results[0] = array_map("utf8_encode", $results[0]);
            return $results[0];
        }            
        
        throw new \Exception('Erro ao carregar animal!');
        
    }

    public static function inserir($data)
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
            $return['cadastrou'] = false;
            return $return;
        }

        $data["ani_nome"] = utf8_decode($data["ani_nome"]);    
        $data["ani_informacoes"] = trim(utf8_decode($data["ani_informacoes"]));       

        $animal = new Animal();
        $animal->setData($data);
        $animal->insert();

        $return['cadastrou'] = true;
        $return['lastId'] = Animal::getLastId();
        

        MensagemHelper::setMensagem("Animal cadastrado com sucesso!");

        return $return;
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

    public function insert()
    {
        $sql = new Sql();

        $results = $sql->query("INSERT INTO tbl_animais(
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
            ":INFO" =>$this->get_ani_informacoes(),
            ":USU" => $this->get_usu_id(),
            ":ESP" => $this->get_esp_id()
        ));
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
             WHERE t1.usu_id = :USER", array(
            ":USER" => $userId
        ));

        foreach($results as $r){
            $r = array_map("utf8_encode", $r);
            array_push($return, $r);
        }

        return $return;
    }

    //Carrega os animais que NÃO SÃO do usuario
    public static function pesquisarAnimais($usuario){
    $sql = new Sql();

    return $sql->selectObj(
    "SELECT * FROM cad_animais
    WHERE (usu_id <> :SEARCH) AND (
    (ani_status = 'adocao') OR (ani_status = 'perdido')
    ) ORDER BY ani_id ", array(
    ":SEARCH" => $usuario
    ));
    }
}