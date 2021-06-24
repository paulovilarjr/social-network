<?php

$host = "127.0.0.1";
$usuario = "root";
$pass = "";
$banco = "s2p";

$conexao = @mysql_connect($host, $usuario, $pass) or die("Não foi possivel se conectar ao banco de dados!");
mysql_select_db($banco) or die("Erro ao selecionar o banco de dados!");

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$user = $_POST["user"];
$email = $_POST["email"];
$senha = $_POST["senha"];
  

$sql4 = @mysql_query("INSERT INTO cadastros(user, nome, sobrenome, email, senha) VALUES('$user', '$nome', '$sobrenome', '$email', '$senha')");
echo "Cadastro efetuado com sucesso!"
  
?>