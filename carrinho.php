<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrinho</title>
  <link rel="stylesheet" href="style-carrinho.css" class="css">

</head>
<body>

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

<?php

	session_start();
	if(!isset($_SESSION['carrinho'])){
		$_SESSION['carrinho'] = array();
	} //adiciona produto 

	if(isset($_GET['acao'])){
	
		//ADICIONAR CARRINHO
		if($_GET['acao'] === 'adicionar'){
			$idProduto = intval($_GET['idProduto']);  
			if(!isset($_SESSION['carrinho'][$idProduto])){
				$_SESSION['carrinho'][$idProduto] = 1;
			} else {
				$_SESSION['carrinho'][$idProduto] += 1;
			}
		} 
		
		//REMOVER CARRINHO 
		if($_GET['acao'] === 'limpar'){
			unset($_SESSION['carrinho']);
			$_SESSION['carrinho'] = array();
		} 
		
		//ALTERAR QUANTIDADE
		if($_GET['acao'] === 'remover'){
			$idProduto = intval($_GET['idProduto']);
			if(isset($_SESSION['carrinho'][$idProduto])){
				$_SESSION['carrinho'][$idProduto] -= 1;
echo 	$_SESSION['carrinho'][$idProduto];			
				if ($_SESSION['carrinho'][$idProduto]<=0){
					unset($_SESSION['carrinho'][$idProduto]);
				}
			}
		}		
   }

    ?>
    <br>
<div class="tabela">
	<table>
		<h1>Carrinho de Compras</h1>
		<thead>
			<tr>
				<th width="144" colspan="3">Descrição</th>
				<th width="79">Qtda.</th>
				<th width="89">Pre&ccedil;o</th>
				<th width="100">SubTotal</th>
				<th width="64">Remover</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td>
					<form action="index.php">
						<button type='submit'>Continuar comprando</button>
					</form>
				</td>
				<td colspan="5">
				</td>
				<td>
					<form action="finalizarCompra.php" width="100%">
						<button type='submit' >Finalizar Compra</button>
					</form>
				</td>
			</tr>
		</tfoot>
		<tbody>
     <?php
        if(count($_SESSION['carrinho']) == 0){
			echo "<tr><td colspan='7'><h2>Não há produto no carrinho</h2></td></tr>";
        } else {
			$conexao = mysqli_connect("localhost", "root", "", "luiza");
			$total = 0;

			foreach($_SESSION['carrinho'] as $idProduto => $qtd){
				$sql   = "SELECT *  FROM tbProduto WHERE `idProduto`= $idProduto";
				$resultado = mysqli_query($conexao,$sql);
				while($linha = mysqli_fetch_array($resultado)){
					echo "<tr>";
					echo "<td width='100'><img width='100' src='imagens/".$linha["nomeFoto"]."'></td>";
					echo "<td>".$linha["produto"]."</td>";
					echo "<td>".$linha["descricaoProduto"]."</td>";
					if($linha["promocao"]=="s") {
						$precoUnitario = $linha["precoPromocao"];
							} else {
								$precoUnitario = $linha["precoVenda"];
							}
							$subTotal   = $precoUnitario * $qtd;
							$total += $precoUnitario * $qtd;
							
							echo "<td>".number_format($qtd, 2, ',', '.')."</td>";
							echo "<td>".number_format($precoUnitario, 2, ',', '.')."</td>";
							echo "<td>".number_format($subTotal, 2, ',', '.')."</td>";
							echo "<td><a href='?acao=remover&idProduto=$idProduto'><img width='25px' src='remover.png'></a></td>";
							}
                }
                $total = number_format($total, 2, ',', '.');
                echo '<tr><td colspan="6">Total</td><td>R$ '.$total.'</td></tr>';
          }
?>
</div>


</body>
</html>


