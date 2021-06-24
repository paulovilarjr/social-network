<?php
require('conect.php'); // Conecção com banco de dados e verificador de seção.
require('cc.php'); // Concatenações
require('solicitacoes.php'); // Verifica as solicitações de amisade variave $amizade.
require('publicar.php'); // Responsavel por publica algo.
require('foto-perfil.php'); // pega a foto do perfil e exibe.
?>
<!DOCTYPE html>
<html>
<head>
	<title>Select And Play</title>
	<link rel="stylesheet" href="_css/estilo.css"/>
	<link rel="stylesheet" href="_css/postagens.css"/>
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
		<a href="fotos.php"><img id="foto-medio-perfil" src="<?php echo $fotoperfil; ?>"></a>
		<br/>
			<br/>
			<a href="p.php?perfil=<?php echo "$user" ?>"><p><img src="images/muser.png" id="menuimagens">Perfil</p></a>
			<p><img src="images/mphotos.png" id="menuimagens"><a href="">Fotos</a></p>
			<p><img src="images/mmovies.png" id="menuimagens"><a href="">Vídeos</a></p>
			<p><img src="images/mtrophy.png" id="menuimagens"><a href="">Conquistas</a></p>
			<p><img src="images/mgroup.png" id="menuimagens"><a href="">Grupos</a></p>
			<p><img src="images/mpages.png" id="menuimagens"><a href="">Paginas</a></p>
			<p><img src="images/mgames.png" id="menuimagens"><a href="">Jogos</a></p>
			<a href="amigos.php?perfil=<?php echo "$user" ?>"><p><img src="images/mfriend.png" id="menuimagens">Amigos</p></a>
			<p><img src="images/mconfig.png" id="menuimagens"><a href="">Configurações</a></p>

	</aside>
		<section id="corpo">
<div id='bloco'>
<h2>Pessoas</h2>
<br/><br/><br/><br/><br/><br/><br/><br/>
<?php


 ?>
</div>
	</section>
		<aside id="direita">
		<img id="nf" src="images/nf.png">
<input type="button" name="button" id="nf" value="Procurar Jogadores">
	</aside>
		<aside id="direita-white">
		Solicitações
		<p>
<?php

echo "$amizade";

 ?>

		</p>
		</aside>
	<footer id="rodape">
		<p>Select and Play - 2015</p>
	</footer>
</div>
</body>
</html>