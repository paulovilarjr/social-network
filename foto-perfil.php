<?php 
$cadastro = $user."_cadastro";
$perfil = isset($_GET['perfil']) ? $_GET['perfil'] : "$user" ;
$pcadastro = $perfil."_cadastro";

					$sql = "SELECT perfil_img, nome, sobrenome FROM cadastros WHERE user='$perfil'";
					$query = mysql_query($sql); 
					$row = mysql_num_rows($query); 

if($row > 0){

	while($linha = mysql_fetch_array($query)){

		$nome = $linha['perfil_img'];
		$nomeu = $linha['nome'];
		$sobrenome = $linha['sobrenome'];
		$fotoperfil = "perfil/".$nome;
	}

}else{

	$fotoperfil = "images/fotomediaperfil.png";

}

?>