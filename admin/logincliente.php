<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Criar conta</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style-login.css">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600;800&display=swap" rel="stylesheet">
		
	</head>
<body>
    
<?php
	session_start();
 ?>

 <br>
<h1 align='center'> Criar cadastro </h1>

<center><br>
        <div class="login">
            <form action="infoclientes.php">
                Email: <input type="email" name="email" required><p></p>
                Nome: <input type="text" name="nome" required><p></p>
                Apelido: <input type="text" name="nickname" required><p></p>
                Senha: <input type="password" name="password" minlength="8" required><p></p>
                Endereço: <input type="text" name="endereco" required><p></p>
                UF: <input type="text" name="uf" maxlength="2" required><p></p>
                Telefone: <input type="text" name="fone" required><p></p>
                <button type="submit">Cadastrar</button><p></p>
             </form>
        </div>
</center>


</body>
</html>