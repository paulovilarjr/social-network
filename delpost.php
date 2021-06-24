<?php 

require('conect.php');
$user=$_SESSION["user"];

$delid=isset($_GET['delid']) ? $_GET['delid'] : 444;
$idpostagem=isset($_GET['idpostagem']) ? $_GET['idpostagem'] : 0;

if($delid == 222) {
	@mysql_query("DELETE FROM postagens WHERE id='$idpostagem' AND autor='$user'");
	echo "<script>alert('Postagem deletada!');location.href=('index.php');</script>";
}else{
}

?>