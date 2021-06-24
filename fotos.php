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

$user = $_SESSION["user"];
$perfil = isset($_GET['perfil']) ? $_GET['perfil'] : "$user" ;
$pamigos = $perfil."_amigos";
require('foto-perfil.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Select And Play</title>
	<link rel="stylesheet" href="_css/estilo.css"/>
	<meta charset="utf-8">
</head>
<body>
	<header id="cabecalho">
		<div id="menu">
			<hgroup>
				<a href="index.php"><img src="images/logo2.png" id="logo"></a>
			</hgroup>
				<img id="home-icon" src="images/home.png">
				<img id="retrato" src="<?php echo $fotoperfil; ?>">
				<nomeuser><?php echo $user ?> (45)</nomeuser>
				<input type="text" name="pesquisa" id="pesquisa">
				<img id="procurar" src="images/lupa.png">
			</div>
		</header>
<div id="interface">
	<aside id="esquerda">
		<img id="foto-medio-perfil" src="<?php echo $fotoperfil; ?>">
		<br/>
			<br/>
			<a href="p.php?perfil=<?php echo "$user" ?>"<p><img src="images/muser.png" id="menuimagens">Perfil</p></a>
			<p><img src="images/mphotos.png" id="menuimagens"><a href="">Fotos</a></p>
			<p><img src="images/mmovies.png" id="menuimagens"><a href="">Vídeos</a></p>
			<p><img src="images/mtrophy.png" id="menuimagens"><a href="">Conquistas</a></p>
			<p><img src="images/mgroup.png" id="menuimagens"><a href="">Grupos</a></p>
			<p><img src="images/mpages.png" id="menuimagens"><a href="">Paginas</a></p>
			<p><img src="images/mgames.png" id="menuimagens"><a href="">Jogos</a></p>
			<p><img src="images/mfriend.png" id="menuimagens"><a href="">Amigos</a></p>
			<p><img src="images/mconfig.png" id="menuimagens"><a href="">Configurações</a></p>

	</aside>
		<section id="corpo">
			<div id='bloco'>
		<h2>Alterar imagem do perfil</h2>

		<form action="" method="post" enctype="multipart/form-data">
	<input type="file" name="img">
	<input type="submit" name="upload" value="Carregar">
	</form>
	<hr size="1">
<?php 

require('upload_img_perfil.php');
//include('mostra.php');
//require('deleta.php');


?>
	</div>
	</section>
	<footer id="rodape">
		<p>Select and Play - 2015</p>
	</footer>
</div>
</body>
</html>