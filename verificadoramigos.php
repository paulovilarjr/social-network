			<?php 

			$amg = isset($_GET['amg']) ? $_GET['amg'] : "66";

			if($amg==100){

				$sql39 = @mysql_query("INSERT INTO solicitacoes(origem, destino, tipo, msg) VALUES('$user', '$perfil', 'amizade', 'Solicitação de Amizade');");

				echo "<script>alert('Solicitação enviada com sucesso!');</script>";

			}elseif($amg==200){
				mysql_query("DELETE FROM amigos WHERE usuario='$perfil' AND amigo='$perfil'");
				mysql_query("DELETE FROM amigos WHERE usuario='$user'  AND amigo='$user'");
				echo "<script>alert('Usuário removido com sucesso!');</script>";
			}else{

			}

				
			$sql2 = "SELECT * FROM amigos WHERE amigo='$perfil'";

		$query2 = mysql_query($sql2); // Consulta os bancos de dados do $sql

		$row2 = mysql_num_rows($query2); // Verifica quantos cadastros tem no $query



			if($row2 > 0){
				$menuamigo = "<a href='p.php?perfil=$perfil&amg=200'<p><img src='images/muser.png' id='menuimagens'>Remover dos Amigos</p></a>";
			}else{
				$menuamigo = "<a href='p.php?perfil=$perfil&amg=100'<p><img src='images/muser.png' id='menuimagens'>Adcionar Como Amigo</p></a>";
			}

// Isto vai verificar se a pessoa está adicionada ou nã para usar no menu lateral.
			?>