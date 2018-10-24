<?php

class Usuario{
  private $usu_id;
  private $usu_foto;
  private $usu_nome;
  private $usu_email;
  private $usu_senha;

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

  //get e set NOME
  public function getNomeUsuario(){
    return $this->usu_nome;
  }
  public function setNomeUsuario($value){
    $this->usu_nome = $value;
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

  public function setData($row){
    $this->setIdUsuario($row['usu_id']);
    $this->setFotoUsuario($row['usu_foto']);
    $this->setNomeUsuario($row['usu_nome']);
    $this->setEmailUsuario($row['usu_email']);
    $this->setSenhaUsuario($row['usu_senha']);
  }

  //Função para retornar os dados de um usuário pelo seu ID
  public function loadById($id){
    $sql = new Sql();
    $results = $sql->select("SELECT * FROM cad_usuarios WHERE usu_id = :ID", array(
      ":ID"=>$id
    ));

    if (count($results) >= 1) {
      $row = $results[0];
      $this->setData($row);
    }
  }

  //Carrega todos os usuários, menos o do ID informado
  public static function getList($usuario){
    $sql = new Sql();

    return $sql->select("SELECT * FROM cad_usuarios WHERE usu_id <> :ID ORDER BY usu_id;", array(
      ":ID" => $usuario
    ));
  }

  //Insere o usuário na tabela
  public function insert(){
    $sql = new Sql();

    $results = $sql->select("INSERT INTO cad_usuarios(
      usu_foto,
      usu_nome,
      usu_email,
      usu_senha)
      VALUES(
        :FOTO,
        :NOME,
        :EMAIL,
        :SENHA)",
      array(
      ":FOTO" => $this->getFotoUsuario(),
      ":NOME" => $this->getNomeUsuario(),
      ":EMAIL" => $this->getEmailUsuario(),
      ":SENHA" => $this->getSenhaUsuario()
    ));

    if (count($results) >= 1) {
      $row = $results[0];
      $this->setData($row);
    }
  }

  //Autentica o usuário utilizando email e senha
  public static function autenticar($email, $senha){
    $sql = new Sql();
    $usuarios = $sql->select("SELECT * FROM cad_usuarios WHERE usu_email = :EMAIL AND usu_senha = :SENHA",array(
      ":EMAIL" => $email,
      ":SENHA" => $senha
    ));

    //se nao for encontrado nenhum usuario
    if (count($usuarios) >= 1) {
      $user = $usuarios[0];

      $_SESSION['login']['logged_in'] = true;
      $_SESSION['login']['usu_id'] = isset($user['usu_id']) ? $user['usu_id'] : '';
    }

    return $usuarios;
  }

  //Altera a foto do usuário
  public function updateFoto($foto){
    $this->setFotoUsuario($foto);

    $sql = new Sql();

    $sql->query("UPDATE cad_usuarios SET
      usu_foto = :FOTO
      WHERE usu_id = :ID",
      array(
        ":ID" => $this->getIdUsuario(),
        ":FOTO" => $this->getFotoUsuario()));
  }

  //Altera o nome do usuário
  public function updateNome($nome){
    $this->setNomeUsuario($nome);

    $sql = new Sql();

    $sql->query("UPDATE cad_usuarios SET
      usu_nome = :NOME
      WHERE usu_id = :ID",
      array(
        ":NOME" => $this->getNomeUsuario(),
        ":ID" => $this->getIdUsuario()));
  }

  //Altera o email do usuário
  public function updateEmail($email){
    $this->setEmailUsuario($email);

    $sql = new Sql();

    $sql->query("UPDATE cad_usuarios SET
      usu_email = :EMAIL
      WHERE usu_id = :ID",
      array(
        ":EMAIL" => $this->getEmailUsuario(),
        ":ID" => $this->getIdUsuario()));
  }

  //Altera a senha do usuário
  public function updateSenha($senha){
    $this->setSenhaUsuario($senha);

    $sql = new Sql();

    $sql->query("UPDATE cad_usuarios SET
      usu_senha = :SENHA
      WHERE usu_id = :ID",
      array(
        ":SENHA" => $this->getSenhaUsuario(),
        ":ID" => $this->getIdUsuario()));
  }

  //Deleta o usuário
  public function delete(){
    $sql = new Sql();

    $sql->query("DELETE FROM cad_usuarios WHERE usu_id = :ID", array(
      ":ID" => $this->getIdUsuario()
    ));

    $this->setIdUsuario(0);
    $this->setFotoUsuario('');
    $this->setNomeUsuario('');
    $this->setEmailUsuario('');
    $this->setSenhaUsuario('');
  }

  public function __construct($foto = "", $nome = "",  $email = "", $senha = ""){

    $this->setFotoUsuario($foto);
    $this->setNomeUsuario($nome);
    $this->setEmailUsuario($email);
    $this->setSenhaUsuario($senha);
  }

  //a função toString é chamada ao tentar imprimir um objeto
  public function __toString(){
    return json_encode(array(
      "usu_id" => $this->getIdUsuario(),
      "usu_foto" => $this->getFotoUsuario(),
      "usu_nome" => $this->getNomeUsuario(),
      "usu_email" => $this->getEmailUsuario(),
      "usu_senha" => $this->getSenhaUsuario()
    ));
  }
}

?>
