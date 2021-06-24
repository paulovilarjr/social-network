<?php 

$postagem = isset($_GET['postagem']) ? $_GET['postagem'] : "nulo" ;
$autor = isset($_GET['autor']) ? $_GET['autor'] : "anonimo" ;
$datapostagem = date("y-m-d-H-i-s");
$data = date("d/m/y");
$hora      = date("H:i"); 
$pn = $_GET['pn'];
$pagina = "pagina";

if($postagem == "nulo"){

}else {

	$sql600 = @mysql_query("INSERT INTO postagens(autor, postagem, destino, tipo, complemento, datapostagem, data, hora) VALUES('$autor', '$postagem', 'pg', '$pagina', '$pn', '$datapostagem', '$data', '$hora')");
	echo "<script>location.href=('pag.php?pn=$pn');</script>";
;
}
?>