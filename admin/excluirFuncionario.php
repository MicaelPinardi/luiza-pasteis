<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>Excluir Funcionário</title>

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
	if(isset($_POST["idFunc"])) {
		if (($_SESSION["funcao"]==="gerente")) {
			$idFunc = $_POST["idFunc"];
			$sql =  "UPDATE `tbfunc` SET `ativo` = 'n' WHERE `tbfunc`.`idFunc` = $idFunc;";
			$conexao = mysqli_connect("localhost", "root", "", "luiza");
			
			// executando instrução SQL
			$resultado = @mysqli_query($conexao, $sql);
			if (!$resultado) {
				die('Query Inválida: ' . @mysqli_error($conexao));
				echo "<form action='listarFuncionario.php'> onsubmit='window.onsubmit = function() { return true; };'";
				echo "<button type='submit'>Voltar</button>";
				echo "</form>";
			}
			header("Location: listarFuncionario.php");
		}
	}
 ?>

<h1 align='center'> Excluir Funcionário </h1>
<h1 id="mensagem" style="color:red;"></h1>
<form  action="excluirFuncionario.php" method="post">

    <input type="hidden" name="idFunc" value="<?php echo $_GET["idFunc"]; ?>">
	
	email: <?php echo $_GET["email"]; ?><p></p>
	Nome: <?php echo $_GET["nome"]; ?><p></p>
	Função: <?php echo $_GET["funcao"];?><p></p>
	
	<button type="submit">Escluir este Funcionário</button><p></p>
 </form>

<form action="listarFuncionario.php">
<button type='submit'>Voltar</button>
</form>
<p></p>
</body>
</html>
