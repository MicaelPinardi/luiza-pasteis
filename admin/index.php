<?php
	session_start();
	if (!isset($_SESSION["logado"])||$_SESSION["logado"]!= TRUE) {
		header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>Página Administrativa</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style-admin.css">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
  	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600;800&display=swap" rel="stylesheet">
	</head>
<body>


<p><a href="../index.php"><img src="../imagens/luiza-pasteis-1.png" alt="logotipo" width="150px"></a></p>	
	<h1>Página adminstrativa</h1>


	<div class="admin">
		<?php
		echo "<h2>Seja Bem-Vindo, ".$_SESSION["nome"]."</h2>";
		if (($_SESSION["funcao"] === "gerente")) {?>
			<form action="listarProduto.php">
			<button type="submit">Produtos</button>
			</form><br>
			<form action="listarFuncionario.php">
			<button type="submit">Funcionários</button>
			</form><br>
			<form action="relatorio.php">
			<button type="submit">Relatório de Vendas</button>
			</form><br>
		<?php }?>
			<form action="sair.php">
		<button type="submit">Sair</button>
		</form>
	</div>

</body>
</html> 