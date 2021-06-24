<?php 

$postagem = isset($_GET['postagem']) ? $_GET['postagem'] : "nulo" ;
$autor = isset($_GET['autor']) ? $_GET['autor'] : "anonimo" ;
$datapostagem = date("y-m-d-H-i-s");
$data = date("d/m/y");
$hora      = date("H:i");   

if($postagem == "nulo"){

}else {

	$sql = @mysql_query("INSERT INTO postagens(postagem, autor, destino, datapostagem, data, hora) VALUES('$postagem', '$autor', '$perfil', '$datapostagem', '$data', '$hora')");
	echo "<script>location.href=('index.php');</script>";
;
}
?>