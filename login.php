<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset = "UTF-8"/>
	<title>Tela de Login</title>
	<link rel="stylesheet" href="_css/login.css"/>
</head>
<body>
	<header id="cabecalho">
			<hgroup>
				<img id="logo" src="images/logo1.png">
			</hgroup>
				<form name="loginform" method="post" action="conexao.php">
				<user>User:</user>
				<senha>Senha:</senha>
				<input type="text" name="user" id="user">
				<input type="password" name="senha" id="senha">
				<input type="submit" value="Entrar">
				</form>
	</header>
<div id="interface">
	<section id="corpo">
		<p>A forma mais fácil de encontrar novas pessoas e fazer
o time perfeito.</p>
		<p>Tenha também as últimas notícias sobre tudo que está
acontecendo nesse universo da maneira mais fácil.</p>
	</section>
	<aside id="direita">
	<form name="signup" method="post" action="cadastro.php">
		<p id="first">Sua primeira vez no site?</p>
		<p>Nome<input type="text" name="nome" id="nome"> </p>
		<p>Sobrenome <input type="text" name="sobrenome" id="sobrenome"></p>
		<p>Usuario <input type="text" name="user" id="user"></p>
		<p>Senha <input type="password" name="senha" id="csenha"></p>
		<p>E-mail <input type="text" name="email" id="email"></p>
		<p><input type="submit" name="cadastrar" id="cadastrar" value="Cadastrar-se"></p>
	</form>		
	</aside>
	<footer id="rodape">
		Social Network - 2015
	</footer>
<div>
</div>
</body>
</html>
