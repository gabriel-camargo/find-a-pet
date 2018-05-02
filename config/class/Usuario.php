<?php

class Usuario{
  private $usu_id;
  private $usu_foto;
  private $usu_cpf;
  private $usu_cnpj;
  private $usu_nome;
  private $usu_apelido;
  private $usu_sexo;
  private $usu_email;
  private $usu_senha;
  private $usu_telefone;
  private $usu_celular;
  private $end_id;

  //get e set ID
  public function getIdUsuario(){
    return $this->usu_id;
  }
  public function setIdUsuario($value){
    $this->usu_id = $value;
  }

  //get e set FOTO
  public function getFotoUsuario(){
    return $this->usu_foto;
  }
  public function setFotoUsuario($value){
    $this->usu_foto = $value;
  }

  //get e set CPF
  public function getCpfUsuario(){
    return $this->usu_cpf;
  }
  public function setCpfUsuario($value){
    $this->usu_cpf = $value;
  }

  //get e set CNPJ
  public function getCnpjUsuario(){
    return $this->usu_cnpj;
  }
  public function setCnpjUsuario($value){
    $this->usu_cnpj = $value;
  }

  //get e set NOME
  public function getNomeUsuario(){
    return $this->usu_nome;
  }
  public function setNomeUsuario($value){
    $this->usu_nome = $value;
  }

  //get e set APELIDO
  public function getApelidoUsuario(){
    return $this->usu_apelido;
  }
  public function setApelidoUsuario($value){
    $this->usu_apelido = $value;
  }

  //get e set SEXO
  public function getSexoUsuario(){
    return $this->usu_sexo;
  }
  public function setSexoUsuario($value){
    $this->usu_sexo = $value;
  }

  //get e set EMAIL
  public function getEmailUsuario(){
    return $this->usu_email;
  }
  public function setEmailUsuario($value){
    $this->usu_email = $value;
  }

  //get e set SENHA
  public function getSenhaUsuario(){
    return $this->usu_senha;
  }
  public function setSenhaUsuario($value){
    $this->usu_senha = $value;
  }

  //get e set TELEFONE
  public function getTelefoneUsuario(){
    return $this->usu_telefone;
  }
  public function setTelefoneUsuario($value){
    $this->usu_telefone = $value;
  }

  //get e set CELULAR
  public function getCelularUsuario(){
    return $this->usu_celular;
  }
  public function setCelularUsuario($value){
    $this->usu_celular = $value;
  }

  //get e set ENDERECO
  public function getEnderecoUsuario(){
    return $this->end_id;
  }
  public function setEnderecoUsuario($value){
    $this->end_id = $value;
  }

  //Função para retornar os dados de um usuário pelo seu ID
  public function loadById($id){
    $sql = new Sql();
    $results = $sql->select("SELECT * FROM cad_usuarios WHERE usu_id = :ID", array(
      ":ID"=>$id
    ));

    if (count($results) >= 1) {
      $row = $results[0];

      $this->setIdUsuario($row['usu_id']);
      $this->setFotoUsuario($row['usu_foto']);
      $this->setCpfUsuario($row['usu_cpf']);
      $this->setCnpjUsuario($row['usu_cnpj']);
      $this->setNomeUsuario($row['usu_nome']);
      $this->setApelidoUsuario($row['usu_apelido']);
      $this->setSexoUsuario($row['usu_sexo']);
      $this->setEmailUsuario($row['usu_email']);
      $this->setSenhaUsuario($row['usu_senha']);
      $this->setTelefoneUsuario($row['usu_telefone']);
      $this->setCelularUsuario($row['usu_celular']);
      $this->setEnderecoUsuario($row['end_id']);

    }
  }

  //a função toString é chamada ao tentar imprimir um objeto
  public function __toString(){
    return json_encode(array(
      "usu_id" => $this->getIdUsuario(),
      "usu_foto" => $this->getFotoUsuario(),
      "usu_cpf" => $this->getCpfUsuario(),
      "usu_cnpj" => $this->getCnpjUsuario(),
      "usu_nome" => $this->getNomeUsuario(),
      "usu_apelido" => $this->getApelidoUsuario(),
      "usu_sexo" => $this->getSexoUsuario(),
      "usu_email" => $this->getEmailUsuario(),
      "usu_senha" => $this->getSenhaUsuario(),
      "usu_telefone" => $this->getTelefoneUsuario(),
      "usu_celular" => $this->getCelularUsuario(),
      "end_id" => $this->getEnderecoUsuario(),
    ));
  }
}

 ?>
