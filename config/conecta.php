  <?php
  error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
//conexão com o banco
$mysqli_connection = new MySQLi('127.0.0.1', 'root', '', 'bd_findapet');
if($mysqli_connection->connect_error){
   echo "Desconectado! Erro: " . $mysqli_connection->connect_error;
}else{
   echo "Conectado!";
}

?>
