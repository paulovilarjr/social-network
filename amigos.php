<?php
require('conect.php'); // Conecta com banco de dados e verificador de seção.

$user = $_SESSION["user"];
$perfil = isset($_GET['perfil']) ? $_GET['perfil'] : "$user" ;
require("foto-perfil.php");
require('contador-amigos.php'); // verifica a quantidade de amigos. $numeroamigos
?>

<!DOCTYPE html>
<html>
<head>
	<title>Select And Play</title>
	<link rel="stylesheet" href="_css/estilo.css"/>
	<link rel="stylesheet" href="_css/amigos.css"/>
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
<?php 

 if($numeroamigos > 0){
  while($linha = mysql_fetch_array($query1)){

    $usuario=$linha['usuario'];
    $amigo=$linha['amigo'];

    $sql2 = "SELECT perfil_img FROM cadastros WHERE user='$amigo'";

    $query2 = mysql_query($sql2); // Consulta os bancos de dados do $sql

    $row2 = mysql_num_rows($query2); // Verifica quantos cadastros tem no $query

    if($row2 > 0){
        while($linha = mysql_fetch_array($query2)){

        $perfil_img=$linha['perfil_img'];
	    $fotoperfil = "perfil/".$perfil_img;
    
        } 
    }

    echo "<perfil><a href='p.php?perfil=$amigo' id='nome-amigos'><img src='$fotoperfil' id='foto-amigos'>$amigo</a></perfil>";

    }

}else{
  echo "Você não tem amigos ainda<br/><br/><br/><br/><br/>";

} 
?><br/><br/><br/><br/><br/>
</div>
	</section>
		<aside id="direita">
		<img id="nf" src="images/nf.png">
<input type="button" name="button" id="nf" value="Procurar Jogadores">
	</aside>
		<aside id="direita">
		Nortificações
		</aside>
	<footer id="rodape">
		<p>Select and Play - 2015</p>
	</footer>
</div>
</body>
</html>
