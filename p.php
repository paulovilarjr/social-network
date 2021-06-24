<?php

require('conect.php'); // Conecção com banco de dados e verificador de seção.

$user = $_SESSION["user"];
$perfil = isset($_GET['perfil']) ? $_GET['perfil'] : "$user" ;
$ppost = $perfil."_postagens";

require('verificadoramigos.php'); // Isto vai verificar se a pessoa está adicionada ou nã para usar no menu lateral.
require('ppublicar.php'); // Responsavel por publica algo.
require('foto-perfil.php'); // pega a foto do perfil.
include('verificador-capa.php'); // verifica se o perfil tem capa e coloca no perfil.
?>

<!DOCTYPE html>
<html>
<head>
	<title>Select And Play</title>
	<link rel="stylesheet" href="_css/p.css"/>
	<link rel="stylesheet" href="_css/postagens.css"/>
	<style type="text/css"> div#perfil.cover {background: url(<?php echo $l_cover; ?>);	background-repeat: no-repeat;background-size: 100% 100%; }</style>
	<meta charset="utf-8">
</head>
<body>
	<header id="cabecalho">
		<div id="menu">
			<hgroup>
				<a href="index.php"><img src="images/logo2.png" id="logo"></a>
			</hgroup>
				<img id="home-icon" src="images/home.png">
				<img id="retrato" src="images/retrato.jpg">
				<nomeuser><?php echo "$user"; ?> (45)</nomeuser>
				<input type="text" name="pesquisa" id="pesquisa">
				<img id="procurar" src="images/lupa.png">
			</div>
		</header>
<div id="interface">
	<a href="cover.php"><div id="perfil<?php echo $cover; ?>>
			<img id="foto-medio-perfil" src="<?php echo $fotoperfil; ?>">
	<h3><?php echo "$nomeu $sobrenome ($perfil)" ?></h3>
	</div></a>
	<aside id="esquerda">
			<?php 

			if($user == $perfil){
			echo "<br/>";
			}else{
			echo "$menuamigo";
		}
			?>
			<p><img src="images/mphotos.png" id="menuimagens"><a href="">Fotos</a></p>
			<p><img src="images/mmovies.png" id="menuimagens"><a href="">Vídeos</a></p>
			<p><img src="images/mtrophy.png" id="menuimagens"><a href="">Conquistas</a></p>
			<p><img src="images/mgroup.png" id="menuimagens"><a href="">Grupos</a></p>
			<p><img src="images/mpages.png" id="menuimagens"><a href="">Paginas</a></p>
			<p><img src="images/mgames.png" id="menuimagens"><a href="">Jogos</a></p>
			<p><img src="images/mfriend.png" id="menuimagens"><a href="">Amigos</a></p>
			<?php 
						if($user == $perfil){
			echo "<p><img src='images/mconfig.png' id='menuimagens'><a href=''>Configurações</a></p>";
			}else{
		}
		?>
	</aside>
		<section id="corpo">
		<div id='bloco'>
		<br/>
  	<form name='atualizar' method='get' id='atualizar' action='p.php'>
		  <center><textarea name="postagem" rows="4" id="textarea"></textarea></center>
		  <input type="text" name="perfil" style="display:none;" value="<?php echo "$perfil" ?>">
		  <input type="text" name="autor" style="display:none;" value="<?php echo "$user" ?>">
		   <input type="submit" name="button" id="button" value="Publicar Algo"><hr/>
  </form>
		</div>
<?php

$sql2 = "SELECT id, postagem, autor, destino, datapostagem, data, hora FROM postagens WHERE autor='$nomeu' OR destino='$perfil' ORDER BY datapostagem DESC";

$query2 = mysql_query($sql2); // Consulta os bancos de dados do $sql

$row2 = @mysql_num_rows($query2); // Verifica quantos cadastros tem no $query

 if($row2 > 0){

  while($linha = mysql_fetch_array($query2)){

$postagem=$linha['postagem'];
$autor=$linha['autor'];
$data=$linha['data'];
$hora=$linha['hora'];
$idpostagem=$linha['id'];


					$sql = "SELECT perfil_img FROM cadastros WHERE user='$autor'";
					$query = mysql_query($sql); 
					$row = mysql_num_rows($query); 

if($row > 0){

	while($linha = mysql_fetch_array($query)){

		$nome = $linha['perfil_img'];
		if($nome == ""){
		$mini = "images/fotomediaperfil.png";
		}else{
		$mini = "perfil/".$nome;
		}
	}

}else{
				$mini = "images/fotomediaperfil.png";
}


if($user == $autor){

	$remover = "<a href='delpost.php?delid=222&idpostagem=$idpostagem'>Remover | </a>";

}else{
	$remover = "";
}

echo "<p><div id='bloco'><img id='mini' src='$mini'><br/><b><inf><a href='p.php?perfil=$autor'>$autor</a></inf><br/><inf id='data'>$data às $hora</inf><avaliacoes>+255</avaliacoes></b></p><post>$postagem</post><administracao><av><a href='#'>Gostei</a> | <a href='#'>Não Gostei</a></av><a href='#'>Comentar</a> | $remover<a href='#'>Compartilhar</a></administracao></div>";

}

}else{

  echo "Ainda não existem publicações";

} 
 ?>
	</section>
		<aside id="direita-green">
		<p>XBOX LIVE: paulovilarjnr</p>
	</aside>
	<aside id="direita-blue">
		<p>PSN: paulovilarjnr</p>
	</aside>
	<aside id="direita-black">
		<p>STEAM: paulovilarjnr</p>
	</aside>
	<footer id="rodape">
		<p>Select and Play - 2015</p>
	</footer>
</div>
</body>
</html>