<?php
	session_start();
	if (!isset($_SESSION["logado"])||($_SESSION["logado"]!= TRUE) || ($_SESSION["funcao"] != "gerente") && ($_SESSION["funcao"] != "caixa")){
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>Relatório de Vendas</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style-admin.css">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
  	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600;800&display=swap" rel="stylesheet">
	</head>
<body>
<h1 align='center'>Relatório de Vendas</h1>
    <br>
<div class="table">
	<table border=1 width="80%" align="center">
		<thead>
			<tr>
				<th width="80">ID do Pedido</th>
				<th width="80">ID do Cliente</th>
				<th width="80">ID do Produto</th>
				<th width="80">Preço Pago</th>
				<th width="80">Data</th>
			</tr>
		</thead>
		<tbody>
     <?php
			$conexao = mysqli_connect("localhost", "root", "", "luiza");
			$sql   = "SELECT * FROM `tbpedido`";
			$resultado = mysqli_query($conexao,$sql);
				while($linha = mysqli_fetch_array($resultado)){
					echo "<tr>";
					echo "<td>".$linha['idPedito']."</td>";
					echo "<td>".$linha['idCliente']."</td>";
					echo "<td>".$linha['idProduto']."</td>";
                    echo "<td>".$linha['precoPago']."</td>";
                    echo "<td>".$linha["data"]."</td>";
          }
?>
</div>


</body>
</html>