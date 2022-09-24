<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Alterar Produto</title>

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
			$nomeNovo = $_POST["nomeNovo"];
			$emailNovo = $_POST["emailNovo"];
			if ($_SESSION["idFunc"]!=$idFunc) {
				$funcaoNovo = $_POST["funcaoNovo"];
				$sql =  "UPDATE `tbfunc` SET `nome` = '$nomeNovo', `email`='$emailNovo', `funcao`='$funcaoNovo' WHERE `tbfunc`.`idFunc` = $idFunc;";
				
			} else {
				$sql =  "UPDATE `tbfunc` SET `nome` = '$nomeNovo', `email`='$emailNovo' WHERE `tbfunc`.`idFunc` = $idFunc;";
			}	
			$conexao = mysqli_connect("localhost", "root", "", "luiza");
			
			// executando instrução SQL
			$resultado = @mysqli_query($conexao, $sql);
			if (!$resultado) {
				die('Query Inválida: ' . @mysqli_error($conexao));
				echo "<form action='listarFuncionario.php'> onsubmit='window.onsubmit = function() { return true; };'";
				echo "<button type='submit'>Voltar</button>";
				echo "</form>";
			}
			mysqli_close($conexao);
			if ($_SESSION["idFunc"]==$idFunc) {
				session_destroy();
				header("Location: login.php");
			}
			header("Location: listarFuncionario.php");
		} else {
			$idFunc = $_POST["idFunc"];
			$nomeNovo = $_POST["nomeNovo"];
			$emailNovo = $_POST["emailNovo"];
			
			$sql =  "UPDATE `tbfunc` SET `nome` = '$nomeNovo', `email`='$emailNovo' WHERE `tbfunc`.`idFunc` = $idFunc;";
			$conexao = mysqli_connect("localhost", "root", "", "luiza");
			
		echo $sql;	
			$resultado = @mysqli_query($conexao, $sql);
			if (!$resultado) {
				die('Query Inválida: ' . @mysqli_error($conexao));
				echo "<form action='listarFuncionario.php'> onsubmit='window.onsubmit = function() { return true; };'";
				echo "<button type='submit'>Voltar</button>";
				echo "</form>";
			}
			mysqli_close($conexao);
			session_destroy();
			header("Location: login.php");
					
		}
	}
 ?>

<h1 align='center'> Alteração Dados de Funcionário </h1>
<h1 id="mensagem" style="color:red;"></h1>
<form  action="alterarFuncionario.php" method="post" onsubmit="verificarDados()">

    <input type="hidden" name="idFunc" value="<?php echo $_GET["idFunc"]; ?>">
	<input type="hidden" name="email" value="<?php echo $_GET["email"]; ?>">
	<input type="hidden" name="nome" value="<?php echo $_GET["nome"]; ?>">
	
	email: <input type="email" name="emailNovo" value="<?php echo $_GET["email"]; ?>" id="input-email"><p></p>
	Nome: <input type="text" name="nomeNovo" value="<?php echo $_GET["nome"]; ?>" id="input-nome"><p></p><p></p><?php
	if (($_SESSION["funcao"]==="gerente")&&($_SESSION["idFunc"]!=$_GET["idFunc"])) {?>
		Função: <input type="radio" name="funcaoNovo" value="gerente" <?php if($_GET["funcao"]==="gerente"){ echo "checked";}?>>Gerente 
		<input type="radio" name="funcaoNovo" value="vendedor"  <?php if($_GET["funcao"]==="vendedor"){ echo "checked";}?>>Vendedor 
		<input type="radio" name="funcaoNovo" value="caixa" <?php if($_GET["funcao"]==="caixa"){ echo "checked";}?>>Caixa<p></p><?php
	} ?>

	
	<button type="submit">Salvar</button><p></p>
 </form>

<form action="listarFuncionario.php">
<button type='submit'>Voltar</button>
</form>
<p></p>

<script>

	function verificarDados() {
		var email = document.getElementById("input-email").value;
		var nome = document.getElementById("input-nome").value;
		if (!validarEmail(email)) {
			alert("Digite um email válido!");
			// abortando submit
			document.getElementById("input-email").focus();
			window.onsubmit = function() { return false; };	
			
		} else if (nome.length<3) {
			alert("O nome deve ter no mínimo 3 caracteres!");
			// abortando submit
			document.getElementById("input-nome").focus();
			window.onsubmit = function() { return false; };

		} else {
			return true;
		}
	}

<?php
	if(isset($_GET["senhaAntigaInvalida"])){ ?>
	    var senhaAntigaInvalida =  <?php echo "\"".$_GET["senhaAntigaInvalida"]."\"";?>;
		document.getElementById('mensagem').innerHTML = "Senha Antiga inválida!";<?php		
	} ?>

</script>
</body>
</html>
