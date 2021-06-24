
<?php
	// Conexão com banco de dados.
	require('conect.php');	
	//Seta os cacteres vindos do banco em UTF8
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET charecter_set_client=utf8');
	mysql_query('SET charecter_set_results=utf8');
	
	//Recupera a pesquisa feita
	$pesquisa 	= mysql_real_escape_string($_POST['palavra']);
	//Recupera oque foi selecionado

	$sql = "SELECT * FROM cadastros WHERE user LIKE '%$pesquisa%'";

	//Excuta a SQL
	$query		= mysql_query($sql) or die("Erro ao Pesquisar");
	
	//Se não for encontrado nada, então diz: 'Nada Encontrado...', se não retorna o resultado
	if(mysql_num_rows($query) <= 0){
		echo 'Nada Encontrado...';
	}else{
		//Como é retornado um array, então precisamos colocar novamente a váriavel '$campo' onde colocamos a nome do campo a ser exibido
		echo "<div id='bloco' class='pesquisa'><h3>Resultado da pesquisa</h3>
				<h4>Usuários</h4>";
		while($res = mysql_fetch_assoc($query)){
			echo '<a href="p.php?perfil='.$res['user'].'"><li>'.$res['user'].' ('.$res['nome'].' '.$res['sobrenome'].')</li></a>';
		} 

		echo "<br/></div>";
	}