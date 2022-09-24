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
 ?>
<h1 align='center'> Alterar Produto </h1>

<form enctype="multipart/form-data" action="upload.php" method="post">

    <input type="hidden" name="acao" value="alterar">
	<input type="hidden" name="idProduto" value="<?php echo $_GET["idProduto"]; ?>">
	
	Produto<input type="text" name="produto" value="<?php echo $_GET["produto"]; ?>"> <p></p>
	Descrição do produto<input type="text" name="descricaoProduto" value="<?php echo $_GET["descricaoProduto"]; ?>"><p></p>
	Preço de Venda<input type="text" name="precoVenda" value="<?php echo $_GET["precoVenda"]; ?>"><p></p>
	
	<input type="hidden" name="nomeFotoAntiga" value="<?php echo $_GET["nomeFoto"]; ?>">
	
	<img width="300" src="../imagens/<?php echo $_GET["nomeFoto"]; ?>" id="preview"><p></p>
	Selecione a foto: <p></p>
	<input type="file" name="imagemProduto" id="img-input"><p></p>
	<button type="submit">Salvar</button><p></p>
 </form>

<form action="listarProduto.php">
<button type='submit'>Voltar</button>
</form>
<p></p>

<script>
	/*
	Este código javascript é responsável por carregar a imagem
	selecionada no componente <img> que esta na tela
	isto permite que a pessoa possa visualizar a fonto antes dela ser enviada para o servidor
	*/
	document.getElementById("img-input").onchange = function () {
		var reader = new FileReader();

		reader.onload = function (e) {
			// get loaded data and render thumbnail.
			document.getElementById("preview").src = e.target.result;
		};

		// read the image file as a data URL.
		reader.readAsDataURL(this.files[0]);
	};
</script>
</body>
</html>