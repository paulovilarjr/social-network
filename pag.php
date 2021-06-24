<?php

require('conect.php'); // Conecção com banco de dados e verificador de seção.

$user = $_SESSION["user"];
$perfil = isset($_GET['perfil']) ? $_GET['perfil'] : "$user" ;
$ppost = $perfil."_postagens";

require('verificadorpagina.php'); // Isto vai verificar se a pessoa está adicionada ou nã para usar no menu lateral.
require('papublicar.php'); // Responsavel por publica algo na pagina.
require('foto-perfil.php'); // pega a foto do perfil.
include('verificador-capa.php'); // verifica se o perfil tem capa e coloca no perfil.

$sql2 = "SELECT * FROM paginas WHERE pn = '$pn'";
$query2 = mysql_query($sql2); 
$row2 = mysql_num_rows($query2);

if($row2 != 1){

	$pag = "Esta página não está disponível!";

}else{

  while($linha = mysql_fetch_array($query2)){

$nomep=$linha['nome'];
$descricao=$linha['descricao'];
$foto=$linha['foto'];
$cover=$linha['cover'];

$pag = "";

	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $pn; ?> - Select And Play</title>
	<link rel="stylesheet" href="_css/pag.css"/>
	<link rel="stylesheet" href="_css/postagens.css"/>
	<style type="text/css"> div#perfil.cover {background: url(photos/pag/<?php echo $cover; ?>);	background-repeat: no-repeat;background-size: 100% 100%; }</style>
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
	<div id="perfil" class="cover">
			<img id="foto-medio-perfil" src="photos/pag/<?php echo $foto; ?>">
	<h3><?php echo "$nomep" ?></h3>
	</div>
	<aside id="esquerda">
			<?php 

			echo "$menuamigo";

			?>
			<p><img src="images/mpages.png" id="menuimagens"><a href="">Mais Curtidos</a></p>
			<p><img src="images/mfriend.png" id="menuimagens"><a href="">Membros</a></p>
			<p><img src="images/mfriend.png" id="menuimagens"><a href="">Sair</a></p>
	</aside>
		<section id="corpo">
		<div id='bloco'>
		<br/>
  	<form name='atualizar2' method='get' id='atualizar2' action='pag.php'>
		  <center><textarea name="postagem" rows="4" id="textarea"></textarea></center>
		  <input type="text" name="autor" style="display:none;" value="<?php echo "$user" ?>">
		  <input type="text" name="pn" style="display:none;" value="<?php echo "$pn" ?>">
		   <input type="submit" name="button" id="button" value="Publicar Algo"><hr/>
  </form>
		</div>
		<?php

$sql2 = "SELECT id, postagem, autor, tipo, complemento, datapostagem, data, hora FROM postagens WHERE tipo='pagina' AND complemento='$pn' ORDER BY datapostagem DESC";

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
		<aside id="direita">
<h3>Mais Comentados do Dia</h3>
	</aside>
	<footer id="rodape">
		<p>Select and Play - 2015</p>
	</footer>
</div>
</body>
</html>