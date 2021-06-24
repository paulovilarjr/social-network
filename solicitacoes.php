<?php
$sol = isset($_GET['sol']) ? $_GET['sol'] : "55";

if($sol==155){
	$origem = $_GET['origem'];
$sql36 = @mysql_query("INSERT INTO amigos(amigo, usuario) VALUES('$origem', '$user')");
$sql37 = @mysql_query("INSERT INTO amigos(amigo, usuario) VALUES('$user', '$origem')");

	$sql35 = "SELECT * FROM solicitacoes WHERE origem='$origem' ORDER BY id DESC";
	mysql_query("DELETE FROM solicitacoes WHERE origem='$origem'");
	echo "<script>
alert('Agora vocês são amigos!');
</script>";



} elseif($sol==255){
	$origem = $_GET['origem'];

			$sql35 = "SELECT * FROM solicitacoes WHERE origem='$origem' ORDER BY id DESC";
				mysql_query("DELETE FROM solicitacoes WHERE origem='$origem'");

	echo "<script>
alert('Vocês não serão amigos!');
</script>";
}else{

}

			$sql2 = "SELECT * FROM solicitacoes WHERE tipo='amizade' AND destino='$user'";

		$query2 = mysql_query($sql2); // Consulta os bancos de dados do $sql

		$row2 = mysql_num_rows($query2); // Verifica quantos cadastros tem no $query


 if($row2 > 0){

  while($linha = mysql_fetch_array($query2)){

$origem=$linha['origem'];





// Conectar com banco cadastros e pegar imagem perfil.

			$sql2 = "SELECT perfil_img FROM cadastros WHERE user='$origem'";

		$query2 = mysql_query($sql2); // Consulta os bancos de dados do $sql

		$row2 = mysql_num_rows($query2); // Verifica quantos cadastros tem no $query


 if($row2 > 0){

  while($linha = mysql_fetch_array($query2)){

$perfil_img=$linha['perfil_img'];


// fim da consulta






		$fotoperfil = "perfil/".$perfil_img;


$amizade = "<p><b>Solicitação de amizade:</b></p>
			<img src='$fotoperfil' id='img-solicitacao'><br/>$origem<br/>
			<b>Aceitar?</b> <a href='index.php?sol=155&origem=$origem'>Sim</a> : <a href='index.php?sol=255&origem=$origem'>Não</a>";
}}}}else{
  $amizade = "Nenhuma nova solicitação.";
} 

 ?>