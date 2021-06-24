<?php

if(isset($_POST['upload'])){
	// INFO IMAGEM
	$imagem = $_FILES['img']; //pega a imagem
	$nome = $imagem['name']; // pega o nome da imagem
	$tmp = $imagem['tmp_name']; // pega o diretório temporário da imagem
	$size = $imagem['size']; // pega o tamanho
	$separador = explode('.',$nome); //separa onde estar a extensão da imagem
	$extensao = strtolower(end($separador)); // pega a extenção

	echo $extensao;

	//Definições da Imagem

	$pasta = 'perfil';
	$extensoes = array('jpg');
	$tamanho = '1048576';

	if(empty($nome)){
		echo '<script>alert("Selecione uma imagem!");</script>';
	}elseif($tamanho < $size) {
		echo '<script>alert("Imagem muito grande!");</script>';		
	}elseif(!in_array($extensao, $extensoes)){
		echo '<script>alert("Formato da imagem inválido!");</script>';
	}else{
		$nome = $user .'_cover.'.$extensao;
		//      NODEHTML.NOMEUNICO.FORMATODAIMAGEM
		$upload = move_uploaded_file($tmp, $pasta.'/'.$nome);

		if($upload){
			$sql = mysql_query("UPDATE cadastros SET cover_img = '1' WHERE user='$user'");
			echo '<script>alert("Imagem Enviada!");location.href=("fotos.php");</script>';
		}else {
			echo '<script>alert("Erro!");</script>';
		}
	}

}
?>