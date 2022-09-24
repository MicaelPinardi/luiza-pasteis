<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Finalizar Compra</title>
  <link rel="stylesheet" href="style-carrinho.css" class="css">
</head>

  <!-- CABEÇALHO -->
  <header>
        <a href="index.php"><img src="imagens/luiza-pasteis-1.png" alt="Logotipo" height="125px"></a>
        <div class="titulo1">
			<h1>Luiza Pastéis</h1>
		</div>
        <ul>
            <li><a href="admin/login.php">Login</a></li>
        </ul>
    </header>

<body>

<div class="compra-realizada">
<?php
	session_start();

	$data = date('Y/m/d');
	$id = $_SESSION['id'];

	$conexao = mysqli_connect("localhost", "root", "", "luiza");

	foreach($_SESSION['carrinho'] as $idProduto => $qtd){

		$sql   = "SELECT *  FROM tbProduto WHERE `idProduto`= $idProduto";
		$resultado = mysqli_query($conexao,$sql);

		while($linha = mysqli_fetch_array($resultado)){

			$idp = $linha['idProduto'];
			if($linha['promocao']=='s'){
				$total=$linha['precoPromocao'];
			}else{
			$total = $linha['precoVenda'];			
			}
		}

			$sql   = "INSERT INTO `tbpedido` (`idPedito`, `idCliente`, `idProduto`, `data`, `precoPago`) VALUES (NULL, '$id', '$idProduto',  '$data', '$total')";
			$resultado = mysqli_query($conexao,$sql);

	}

	unset($_SESSION['carrinho']);
	$_SESSION['carrinho'] = array();
	echo "<p>Compra registra com sucesso! Agradecemos pela preferência</p>";
?>
<form action="index.php">
<button type='submit'>Deseja comprar mais?</button>
</form>
</div>

</body>
