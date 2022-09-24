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

<?php
session_start();
if ((isset($_SESSION["logado"]))&&($_SESSION["logado"]== TRUE)) {
    echo"Olá, ".$_SESSION['nickname'];
    echo"<br><b>ID de usuário:</b> ".$_SESSION['id'];				
    echo"<br><b>Email:</b> ".$_SESSION['email'];
    echo"<br><b>Nome:</b> ".$_SESSION['nome'];
    echo"<br><b>Endereço:</b> ".$_SESSION['endereco'];
    echo"<br><b>UF:</b> ".$_SESSION['uf'];
    echo"<br><b>Telefone:</b> ".$_SESSION['fone'];
} else {
    header("location: login.php");
    }
?>

<br><br>
<form action="../index.php">
    <button type="submit">Voltar</button>
</form>
<br>
<form action="sair.php">
    <button type="submit">Sair da conta</button>
</form>