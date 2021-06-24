<?php

$host = "127.0.0.1";
$user = "root";
$pass = "";
$banco = "s2p";

$conexao = @mysql_connect($host, $user, $pass) or die("Não foi possivel se conectar ao banco de dados!");
mysql_select_db($banco) or die("Erro ao selecionar o banco de dados!");

	session_start();
	if(!isset($_SESSION["user"]) || !isset($_SESSION["senha"])){

		header("location: login.php");
		exit;

	}else{

	}
?>