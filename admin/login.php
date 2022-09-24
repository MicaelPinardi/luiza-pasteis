<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style-login.css">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600;800&display=swap" rel="stylesheet">
		
	</head>
	
<body>

	<p><a href="../index.php"><img src="../imagens/luiza-pasteis-1.png" alt="logotipo" width="150px"></a></p>	


<?php
	session_start();
	if ((isset($_SESSION["logado"]))&&($_SESSION["logado"]== TRUE)&&($_SESSION["funcao"]=='gerente')) {
		header("Location: index.php");
	} else if ((isset($_SESSION["logado"]))&&($_SESSION["logado"]== TRUE)&&($_SESSION["funcao"]=='cliente')) {
		//O funcionario ja efetuou o login então ele volta para a pagina administrativa
		header("Location: infologin.php");
	} else {
		// Verificando se o usário digitou email e  senha e clicou em "logar"
		if ((isset($_POST["email"]))&&(isset($_POST["senha"]))){
			
	
			$conexao = mysqli_connect("localhost", "root", "", "luiza");
			$sql = "SELECT * FROM `tbFunc`;";
			$resultado = mysqli_query($conexao,$sql);

			if (!($linha = mysqli_fetch_array($resultado))) {
				//reiniciando a chave primaria
				$sql="ALTER TABLE `tbfunc` AUTO_INCREMENT = 0;";
				$resultado = mysqli_query($conexao,$sql);
								
				//criando o usuários supervidor
				$email="supervisor@supervisor.com";
				$senha="supervisor";
				
				$sql="INSERT INTO `tbfunc` (`idFunc`, `email`, `senha`, `nome`, `funcao`) VALUES (NULL, '$email', '$senha', 'supervisor', 'gerente');";
				$resultado = mysqli_query($conexao,$sql);
				
			}
		
			
			$email=$_POST["email"];
			$senha=$_POST["senha"];

			$sql = "SELECT * FROM `tbfunc` WHERE `email` = '$email' AND `senha` = '$senha'";
			$resultado = mysqli_query($conexao,$sql);

			if ($linha = mysqli_fetch_array($resultado)) {
				$_SESSION["id"] = $linha["idFunc"];				
				$_SESSION["logado"] = TRUE;
				$_SESSION["funcao"] = $linha["funcao"];
				$_SESSION["nome"] = $linha["nome"];
				$_SESSION['email'] = $linha['email'];
				$_SESSION['senha'] = $linha['senha'];
			header("Location: index.php");} 
			
			else {

			$sql = "SELECT * FROM `login` WHERE `email` = '$email' AND `senha` = '$senha'";
			$resultado = mysqli_query($conexao,$sql);
			if ($linha = mysqli_fetch_array($resultado)) {
				$_SESSION["id"] = $linha["id"];				
				$_SESSION["logado"] = TRUE;
				$_SESSION["funcao"] = $linha["funcao"];
				$_SESSION["nome"] = $linha["nome"];
				$_SESSION['email'] = $linha['email'];
				$_SESSION['nickname'] = $linha['nickname'];
				$_SESSION['password'] = $linha['password'];
				$_SESSION['endereco'] = $linha['endereco'];
				$_SESSION['uf'] = $linha['uf'];
				$_SESSION['fone'] = $linha['telefone'];

				header("Location: infologin.php");
		
				} else { ?>
						<script>document.getElementById('mensagem').innerHTML = "Email e/ou Senha inválidados!"</script>
	<?php 
	}
	}
	}
}
?>	
<center>

	<div class="login">
		<h1>Login</h1>
		
		<h1 id="mensagem"></h1>
		<div id="infos">
				<form action="login.php" method="post">
					Email <input type=text name="email" autocomplete="off" required onclick="document.getElementById('mensagem').innerHTML = ''"><p></p>
					Senha <input type=password name="senha" autocomplete="off" required onclick="document.getElementById('mensagem').innerHTML = ''"><p></p>
					<input class="botao" type=submit value="Logar">
					<br>
					<br>
					<a href="logincliente.php">Criar conta</a>
				</form>
		</div>
	</div>
</center>
</body>
</html>



