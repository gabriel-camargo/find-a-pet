<?php
//CONECTA COM O BANCO DE DADOS
require_once("conecta.php");

// inclui o arquivo de inicialização
require 'init.php';

// resgata variáveis do formulário
$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

if (empty($email) || empty($senha))
{
    echo "Informe email e senha";
    exit;
}

// cria o hash da senha
$passwordHash = make_hash($senha);

$PDO = db_connect();

$sql = "SELECT usu_email, usu_senha FROM cad_usuarios WHERE usu_email = $email AND usu_senha = $senha";
$stmt = $PDO->prepare($sql);

$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $passwordHash);

$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($users) <= 0)
{
    echo "Email ou senha incorretos";
    exit;
}

// pega o primeiro usuário
$user = $users[0];

session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];

header('Location: index.php');




/*
//RECEBE OS DADOS DO FORMULARIO
$email =  $_POST["email"];
$senha   =  $_POST["senha"];

if (empty($email) || empty($senha))
{
    echo "Informe email e senha";
    exit;
}

//VERIFICA
$sql = mysqli_query($mysqli_connection,"SELECT usu_email, usu_senha FROM cad_usuarios WHERE usu_email = '$email' AND usu_senha = '$senha'")
or die("ERRO NO COMANDO SQL");

//LINHAS AFETADAS PELA CONSULTA
$row = mysqli_num_rows($sql);

//VERIFICA SE RETORNOU ALGO
if($row == 0) {
	echo "<script>window.location='index.php',window.alert('Usuario/Senha invalidos')</script>";
	//Header("Location: index.php");
}//echo "Usu�rio/Senha inv�lidos";

else {
//PEGA OS DADOS
	$email = mysqli_result($sql, 0, "email");
	$senha   = mysqli_result($sql, 0, "senha");

//INICIALIZA A SESS�O
	session_start();

//GRAVA AS VARI�VEIS NA SESS�O
	$_SESSION['usu'] = $email;
	$_SESSION['sen'] = $senha;

//REDIRECIONA PARA A P�GINA QUE VAI EXIBIR OS PRODUTOS
	Header("Location: index.php");
} //FECHA ELSE*/


?>
