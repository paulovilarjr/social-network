<?php
require('conect.php'); // Conecção com banco de dados e verificador de seção.
require('cc.php'); // Concatenações
require('solicitacoes.php'); // Verifica as solicitações de amisade variave $amizade.
require('publicar.php'); // Responsavel por publica algo.
require('foto-perfil.php'); // pega a foto do perfil e exibe.
require('contador-amigos.php'); // Conta a quantidade de amigos. $numeroamigos
?>
<!DOCTYPE html>
<html>
<head>
	<title>Select And Play</title>
	<link rel="stylesheet" href="_css/estilo.css"/>
	<link rel="stylesheet" href="_css/menuv.css"/>
	<link rel="stylesheet" href="_css/postagens.css"/>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script language="javascript"src="javascript/pesquisa.js"></script>
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
				<nomeuser><?php echo $user ?></nomeuser>
				<form id="form-pesquisa" action="" method="post">
				<input type="text" name="pesquisa" id="pesquisa">
				<img id="procurar" src="images/lupa.png">
				</form>
				<nav>
  <ul class="menu">
            <li><a href="#">▼</a>
                <ul>
                      <li><a href="criar-pag.php">Criar Página/Grupo</a></li>
                      <li><a href="#">Gerenciar Minhas Páginas/Grupos</a></li>                     
                      <li><a href="#">Minhas Configurações</a></li>
                      <li><a href="#">Sair</a></li>                   
                </ul>
            </li>          
</ul>
</nav>
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
			<a href="amigos.php?perfil=<?php echo "$user" ?>"><p><img src="images/mfriend.png" id="menuimagens">Amigos (<?php echo $numeroamigos; ?>)</p></a>
			<p><img src="images/mconfig.png" id="menuimagens"><a href="">Configurações</a></p>

	</aside>
		<section id="corpo">
				<pesquisa class="resultados"></pesquisa>
		<div id="bloco">
		<br/>
  	<form name='atualizar' method='get' id='atualizar' action='index.php'>
		  <center><textarea name="postagem" rows="4" id="textarea"></textarea></center>
		  <input type="text" name="perfil" style="display:none;" value="<?php echo "$perfil" ?>">
		  <input type="text" name="autor" style="display:none;" value="<?php echo "$user" ?>">
		   <input type="submit" name="button" id="button" value="Publicar Algo"><hr/>
  </form>
</div>
<?php

//concatenar
$allf = "autor='$user'";

$sql1 = "SELECT amigo, usuario FROM amigos WHERE usuario='$user'";

$query1 = mysql_query($sql1); // Consulta os bancos de dados do $sql

$row1 = mysql_num_rows($query1); // Verifica quantos cadastros tem no $query

 if($row1 > 0){

  while($linha = mysql_fetch_array($query1)){

$amigo=$linha['amigo'];

$allf = $allf . " OR autor='" . $amigo . "'";

}
}else{

}
//concatenar

$sql2 = "SELECT id, postagem, autor, datapostagem, data, hora FROM postagens WHERE $allf OR destino='$user' ORDER BY datapostagem DESC";

$query2 = mysql_query($sql2); // Consulta os bancos de dados do $sql

$row2 = mysql_num_rows($query2); // Verifica quantos cadastros tem no $query

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
		<p><img id="nf" src="images/nf.png"></p>
<p><input type="button" name="button" id="nf" value="Procurar Jogadores"></p>
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