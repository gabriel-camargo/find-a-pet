<?php

class Animal{
  private $ani_id;
  private $ani_nome;
  private $ani_faixa_etaria;
  private $ani_sexo;
  private $ani_informacoes;
  private $ani_foto;
  private $ani_status;
  private $usu_id;
  private $ani_raca;
  private $ani_especie;
  private $ani_dt_hr;

  //get e set ID
  public function getIdAnimal(){
    return $this->ani_id;
  }
  public function setIdAnimal($value){
    $this->ani_id = $value;
  }
  //get e set NOME
  public function getNomeAnimal(){
    return $this->ani_nome;
  }
  public function setNomeAnimal($value){
    $this->ani_nome = $value;
  }
  //get e set FAIXA ETARIA
  public function getFaixaAnimal(){
    return $this->ani_faixa_etaria;
  }
  public function setFaixaAnimal($value){
    $this->ani_faixa_etaria = $value;
  }
  //get e set SEXO
  public function getSexoAnimal(){
    return $this->ani_sexo;
  }
  public function setSexoAnimal($value){
    $this->ani_sexo = $value;
  }
  //get e set INFORMAÇÕES
  public function getInformacoesAnimal(){
    return $this->ani_informacoes;
  }
  public function setInformacoesAnimal($value){
    $this->ani_informacoes = $value;
  }
  //get e set FOTO
  public function getFotoAnimal(){
    return $this->ani_foto;
  }
  public function setFotoAnimal($value){
    $this->ani_foto = $value;
  }
  //get e set STATUS
  public function getStatusAnimal(){
    return $this->ani_status;
  }
  public function setStatusAnimal($value){
    $this->ani_status = $value;
  }
  //get e set USUARIO ID
  public function getIdUsuario(){
    return $this->usu_id;
  }
  public function setIdUsuario($value){
    $this->usu_id = $value;
  }
  //get e set RAÇA ID
  public function getRacaAnimal(){
    return $this->ani_raca;
  }
  public function setRacaAnimal($value){
    $this->ani_raca = $value;
  }
  //get e set RAÇA ID
  public function getEspecieAnimal(){
    return $this->ani_especie;
  }
  public function setEspecieAnimal($value){
    $this->ani_especie = $value;
  }
  //get e set DATA HORA
  public function getDataHoraAnimal(){
    return $this->ani_dt_hr;
  }
  public function setDataHoraAnimal($value){
    $this->ani_dt_hr = $value;
  }



  public function setData($row){
    $this->setIdAnimal($row['ani_id']);
    $this->setNomeAnimal($row['ani_nome']);
    $this->setFaixaAnimal($row['ani_faixa_etaria']);
    $this->setSexoAnimal($row['ani_sexo']);
    $this->setInformacoesAnimal($row['ani_informacoes']);
    $this->setFotoAnimal($row['ani_foto']);
    $this->setStatusAnimal($row['ani_status']);
    $this->setIdUsuario($row['usu_id']);
    $this->setRacaAnimal($row['ani_raca']);
    $this->setEspecieAnimal($row['ani_especie']);
    $this->setDataHoraAnimal(new DateTime($row['ani_dt_hr']));
  }


  //Função para retornar os dados de um usuário pelo seu ID
  public function loadById($id){
    $sql = new Sql();
    $results = $sql->select("SELECT * FROM cad_animais WHERE ani_id = :ID", array(
      ":ID"=>$id
    ));

    if (count($results) >= 1) {
      $row = $results[0];

      $this->setData($row);
    }
  }



  public function insert(){
    $sql = new Sql();

    $results = $sql->select("INSERT INTO cad_animais(
      ani_nome,
      ani_faixa_etaria,
      ani_sexo,
      ani_informacoes,
      ani_foto,
      ani_status,
      usu_id,
      ani_raca,
      ani_especie)
      VALUES(
        :NOME,
        :FAIXA_ETARIA,
        :SEXO,
        :INFORMACOES,
        :FOTO,
        :STATUS,
        :USUARIO,
        :RACA,
        :ESPECIE)",
      array(
      ":NOME" => $this->getNomeAnimal(),
      ":FAIXA_ETARIA" => $this->getFaixaAnimal(),
      ":SEXO" => $this->getSexoAnimal(),
      ":INFORMACOES" => $this->getInformacoesAnimal(),
      ":FOTO" => $this->getFotoAnimal(),
      ":STATUS" => $this->getStatusAnimal(),
      ":USUARIO" => $this->getIdUsuario(),
      ":RACA" => $this->getRacaAnimal(),
      ":ESPECIE" => $this->getEspecieAnimal()
    ));

    if (count($results) >= 1) {
      $row = $results[0];
      $this->setData($row);
    }
  }




    public function __construct($nome = "", $faixa = "", $sexo = "", $informacoes = "", $foto = "", $status = "",
     $usuario = "", $raca = "", $especie = ""){

      $this->setNomeAnimal($nome);
      $this->setFaixaAnimal($faixa);
      $this->setSexoAnimal($sexo);
      $this->setInformacoesAnimal($informacoes);
      $this->setFotoAnimal($foto);
      $this->setStatusAnimal($status);
      $this->setIdUsuario($usuario);
      $this->setRacaAnimal($raca);
      $this->setEspecieAnimal($especie);
    }

    //a função toString é chamada ao tentar imprimir um objeto
    public function __toString(){
      return json_encode(array(
        "ani_id" => $this->getIdAnimal(),
        "ani_nome" => $this->getNomeAnimal(),
        "ani_faixa_etaria" => $this->getFaixaAnimal(),
        "ani_sexo" => $this->getSexoAnimal(),
        "ani_informacoes" => $this->getInformacoesAnimal(),
        "ani_foto" => $this->getFotoAnimal(),
        "ani_status" => $this->getStatusAnimal(),
        "usu_id" => $this->getIdUsuario(),
        "ani_raca" => $this->getRacaAnimal(),
        "ani_especie" => $this->getEspecieAnimal(),
        "ani_dt_hr" => $this->getDataHoraAnimal()
      ));
    }
 }



  ?>
