<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Excluir Produto</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style-admin.css">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
  	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600;800&display=swap" rel="stylesheet">
		
	</head>
<body>
<?php
	session_start();
	if (!isset($_SESSION["logado"])||$_SESSION["logado"]!= TRUE) {
		header("Location: login.php");
	}
	if (isset($_POST["idProduto"])) {
		//conectar com o banco de dados
		$conexao = mysqli_connect("localhost", "root", "", "luiza");
		//Não será realmente excluido. Apenas os será inativado ou seja ativo="n"
		$sql = "UPDATE `tbproduto` SET `ativo` = 'n' WHERE `tbproduto`.`idProduto` = ".$_POST["idProduto"].";";
		$resultado = mysqli_query($conexao,$sql);
		header("Location: listarProduto.php");
	}

 ?>
<h1 align='center'> Excluir Produto </h1>
<p></p>
<form action="listarProduto.php">
<button type='submit'>Voltar</button>
</form>
<p></p>
ID# : <?php echo $_GET["idProduto"]; ?> <p></p> 
Prouduto : <?php echo $_GET["produto"]; ?> <p></p>
Descrição do produto : <?php echo $_GET["idProduto"]; ?> <p></p>
Preço de Venda : <?php echo $_GET["precoVenda"]; ?> <p></p>
Promoção : <?php echo $_GET["promocao"]; ?> <p></p>
Preco Promoção : <?php echo $_GET["precoPromocao"]; ?> <p></p>
Foto : <p></p> <img width="300" src="../imagens/<?php echo $_GET["nomeFoto"]; ?>"><p></p>
<form action="excluirProduto.php" method="post">
<input type="hidden" name="idProduto" value="<?php echo $_GET["idProduto"];?>">
<button type='submit'>Excluir este Produto</button>
</form>

<form action="listarProduto.php">
<button type='submit'>Voltar</button>
</form>
<p></p>

</body>
</html>
