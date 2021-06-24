<?php

require('conect.php'); // Conecção com banco de dados e verificador de seção.

$user = $_SESSION["user"];
$perfil = isset($_GET['perfil']) ? $_GET['perfil'] : "$user" ;
$ppost = $perfil."_postagens";

require('verificadoramigos.php'); // Isto vai verificar se a pessoa está adicionada ou nã para usar no menu lateral.
require('foto-perfil.php'); // pega a foto do perfil.

?>

<!DOCTYPE html>
<html>
<head>
	<title>Select And Play</title>
	<link rel="stylesheet" href="_css/newpag.css"/>
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
				<img id="retrato" src="images/retrato.jpg">
				<nomeuser><?php echo "$user"; ?> (45)</nomeuser>
				<input type="text" name="pesquisa" id="pesquisa">
				<img id="procurar" src="images/lupa.png">
			</div>
		</header>
		<section id="corpo">
		<div id='bloco'>
		<?php

$criar = isset($_POST['criar']) ? $_POST['criar'] : "0";
if($criar == 0) {

	echo '
  	<form name="newpag" method="post" id="newpage" action="criar-pag.php">
  			<h3>Criar Nova Página ou Grupo</h3>
  			 <input type="text" id="criar" name="criar" style="display:none;" value="1"">
  			<p><b>O que você deseja criar?<br/><br/><select name="tipo" id="tipo">
  				<option value="1">Página</option>
  				<option value="2">Grupo</option>
  			</select>
  			<p>Nome da Página ou Grupo<br/><br/><input type="text" id="text" name="nome"></p>
  			<p>Descrição da Página  ou Grupo<br/><br/><textarea type="text" name="descricao" id="textarea" rows="3"></textarea></p>
  			<p>O conteúdo dessa Página  ou Grupo é?<br/><br/><select name="range" id="range">
  			<option value="0">Público</option>
  			<option value="1">Privado</option>
  			</select></b></p>
		   <input type="submit" name="button" id="button" value="Criar Página">
  </form>';}elseif($criar== 1){

$nome = $_POST['nome'];
$datacriacao = date("y-m-d-H-i-s");
$descricao = $_POST['descricao'];
$tipo = $_POST['tipo'];
$range = $_POST['range'];


  		$criando = @mysql_query("INSERT INTO paginas(nome, datacriacao, descricao, tipo, range) VALUES('$nome', '$datacriacao', '$descricao', '$tipo', '$range')");

  	echo 'Página criada com sucesso!';

  }else{}
  ?>
		</div>
	</section>
</div>
</body>
</html>