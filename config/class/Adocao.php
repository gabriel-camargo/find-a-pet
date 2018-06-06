<?php

class Adocao{
  private $ado_id;
  private $ado_dt_hr;
  private $usu_doador_id;
  private $usu_adotador_id;
  private $ani_id;

  //get e set ID ADOÇÃO
  public function getIdAdocao(){
    return $this->ado_id;
  }
  public function setIdAdocao($value){
    $this->ado_id = $value;
  }

  //get e set DATA E HORA ADOÇÃO
  public function getDataHoraAdocao(){
    return $this->ado_dt_hr;
  }
  public function setDataHoraAdocao($value){
    $this->ado_dt_hr = $value;
  }

  //get e set DOADOR ID
  public function getIdDoador(){
    return $this->usu_doador_id;
  }
  public function setIdDoador($value){
    $this->usu_doador_id = $value;
  }

  //get e set ADOTADOR ID
  public function getIdAdotador(){
    return $this->usu_adotador_id;
  }
  public function setIdAdotador($value){
    $this->usu_adotador_id = $value;
  }

  //get e set ID ANIMAL
  public function getIdAnimal(){
    return $this->ani_id;
  }
  public function setIdAnimal($value){
    $this->ani_id = $value;
  }

  public function setData($row){
    $this->setIdAdocao($row['ado_id']);
    $this->setDataHoraAdocao(new DateTime($row['ado_dt_hr']));
    $this->setIdDoador($row['usu_doador_id']);
    $this->setIdAdotador($row['usu_adotador_id']);
    $this->setIdAnimal($row['ani_id']);
  }

  public function loadByAnimal($animal){
    $sql = new Sql();
    $results = $sql->select("SELECT * FROM adocoes WHERE ani_id = :ANIMAL", array(
      ":ANIMAL"=>$animal
    ));

    if (count($results) >= 1) {
      $row = $results[0];

      $this->setData($row);


    }
  }
  public function insert(){
    $sql = new Sql();

    $results = $sql->select("INSERT INTO adocoes(
      usu_doador_id,
      usu_adotador_id,
      ani_id)
      VALUES(
        :DOADOR,
        :ADOTADOR,
        :ANIMAL)",
      array(
      ":DOADOR" => $this->getIdDoador(),
      ":ADOTADOR" => $this->getIdAdotador(),
      ":ANIMAL" => $this->getIdAnimal()
    ));

    if (count($results) >= 1) {
      $row = $results[0];
      $this->setData($row);
    }
  }

  //a função toString é chamada ao tentar imprimir um objeto
  public function __toString(){
    return json_encode(array(
      "ado_id" => $this->getIdAdocao(),
      "ado_dt_hr" => $this->getDataHoraAdocao(),
      "usu_id_doador" => $this->getIdDoador(),
      "usu_id_adotador" => $this->getIdAdotador(),
      "ani_id" => $this->getIdAnimal()
    ));
  }
}

 ?>
