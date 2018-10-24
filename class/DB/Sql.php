<?php

  class Sql extends PDO{

    private $conn;

    //Metodo contrutor da classe ja inicia automaticamente a conexão com o banco de dados
    public function __construct(){
      $this->conn = new PDO("mysql:host=localhost;dbname=bd_findapet", "root", "");
    }

    //Função que chama o método 'setParam' para todos as linhas da tabela
    private function setParams($statment, $parameters = array()){
      foreach ($parameters as $key => $value) {
        $this->setParam($statment, $key, $value);
      }
    }

    //Função que troca os "?" pelos valores do banco
    private function setParam($statment, $key, $value){
      $statment->bindParam($key, $value);
    }

    //Executa o comando MySQL da query
    public function query($rawQuery, $params = array()){
      $stmt = $this->conn->prepare($rawQuery);
      $this->setParams($stmt, $params);

      $stmt->execute();

      return $stmt;
    }

    //Função que chama a função query, mas retorna apenas os valores dos campos
    public function select($rawQuery, $params = array()):array{
      $stmt = $this->query($rawQuery, $params);

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  }

 ?>
