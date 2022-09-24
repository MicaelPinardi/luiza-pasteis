<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>Informações de Login</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style-admin.css">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
  	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600;800&display=swap" rel="stylesheet">
	</head>

<?php
$email = $_GET['email'];
$nome = $_GET['nome'];
$nickname = $_GET['nickname'];
$password = $_GET['password'];
$endereco = $_GET['endereco'];
$uf = $_GET['uf'];
$fone = $_GET['fone'];

$conexao = mysqli_connect("localhost", "root", "", "luiza");

$sql = "INSERT INTO `login` (`id`, `nome`, `nickname`, `email`, `senha`, `endereco`, `uf`, `telefone`, `funcao`) VALUES (NULL, '$nome', '$nickname', '$email', '$password', '$endereco','$uf', '$fone','cliente')";

$resultado = mysqli_query($conexao, $sql);
mysqli_close($conexao);

header("Location: index.php");
?>