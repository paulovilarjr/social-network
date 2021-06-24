<?php 

$sql6 = "SELECT user, cover_img FROM cadastros WHERE user='$perfil' AND cover_img='1'";

					$query = mysql_query($sql6); 
					$row = mysql_num_rows($query); 

if($row > 0){

	$cover = '" class="cover"';
	$l_cover = "perfil/".$perfil."_cover.jpg";

}else{

	$cover = '"';
	$l_cover = "images/fundo-perfil.jpg";

}
?>