<?php

$host = "127.0.0.1";
$usuario = "root";
$pass = "";
$banco = "s2p";

$conexao = @mysql_connect($host, $usuario, $pass) or die("Não foi possivel se conectar ao banco de dados!");
mysql_select_db($banco) or die("Erro ao selecionar o banco de dados!");

?>

<html>
<head>
	<title>Autenticando Usuario</title>
	<meta charset="utf-8">
	<script type="text/javascript">
	function loginsuccessfully() {

		setTimeout("window.location='index.php'", 1000)
	}

function loginfailed(){

	setTimeout("window.location='login.php'", 5000)
	}

</script>
</head>

<body>

<?php

$user = $_POST["user"];
$senha = $_POST["senha"];

$sql = mysql_query("SELECT user, senha FROM cadastros WHERE user = '$user' and senha = '$senha'") or die("Não foi possivel verificar os dados!"); // Vereifica se os dados existem!
$row = mysql_num_rows($sql); // Vai contar quantos $sql existem!

if($row > 0){
	session_start(); //Abre uma seção para o usuario.
		$_SESSION['user']=$_POST['user'];
		$_SESSION['senha']=$_POST['senha'];

	echo "<center>Login efetuado com sucesso! Aguarde...</center>";
	echo "<script>loginsuccessfully()</script>";
}else{

	echo "O usuario não existe! Aguarde e tente novamente";
	echo "<script>loginfailed()</script>";

}
?>


</body>
</html>