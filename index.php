<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Inicial</title>
  <link rel="stylesheet" href="style-index.css" class="css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>

<body>

  <!-- CABEÇALHO -->
  <header>
        <a href="index.php"><img src="imagens/luiza-pasteis-1.png" alt="Logotipo" height="125px"></a>
        <h1 class="title">Luiza Pastéis</h1>
        <ul>
            <li><a href="carrinho.php">Carrinho</a></li>
            <li><a href="admin/login.php">Login</a></li>
        </ul>
    </header>

<!-- PASTEL NOVIDADE -->

<div class="novidade">
        <div class="img-1"><img src="imagens/pastel.jpg" alt="pastel-1" width="550px"></div>
        <div class="informacoes">
            <h2>Cesta de Pastéis</h2>
            <h3>NOVIDADE por apenas R$ 55,00!</h3>
            <br>
            <p>10 pastéis de cada sabor de sua escolha</p>
        </div>
    </div>


  <?php
  session_start();
  //conectar com o banco de dados
  $conexao = mysqli_connect("localhost", "root", "", "luiza");
  $sql = "SELECT * FROM `tbproduto` WHERE `promocao` LIKE 's' order by produto";
  $resultado = mysqli_query($conexao, $sql);
  ?>

  <div class="promocao">
  <h2>Quer provar essa novidade?</h2>
  
  <?php
  while ($linha = mysqli_fetch_array($resultado)) {
    echo '<div class="comprar-promoção">';
    echo "<div class='aligntitle'><b>" . $linha['produto'] . "</b></div><br>";
    echo $linha['descricaoProduto'];
    echo $linha['precoPromocao'] . "";
    echo "<br>";
    echo "<a href=\"carrinho.php?acao=adicionar&idProduto=".$linha['idProduto']."\"><img width=\"25px\" src=\"adicionar.png\"> </a>"
  ?><br>
  </div>
  
  <?php
    echo "</div>";
  }

  $sql = "SELECT * FROM `tbproduto` WHERE `promocao` LIKE 'n' order by produto";
  $resultado = mysqli_query($conexao, $sql);

  ?>

  <h1>Pastéis</h1>
  <div class="pasteis">

  <?php
  while ($linha = mysqli_fetch_array($resultado)) {
    echo '<div class="pastel">';
    echo "<img width='190px' height='119px' src='imagens/" . $linha["nomeFoto"] . "'<br>";
    echo "<div><b>" . $linha['produto'] . "</b></div><br>";
    echo $linha['descricaoProduto'] . "<br>";
    echo $linha['precoVenda'] . "<br>";
    echo "<a href=\"carrinho.php?acao=adicionar&idProduto=".$linha['idProduto']."\"><img width=\"25px\" src=\"adicionar.png\"></a>"
  ?>
    <br>
  <?php
    echo "</div>";
  }
  mysqli_close($conexao);
    ?>
  </div>
<div class="infos">
        <div class="endereco">
            <img src="imagens/pastelaria-endereço.jpg" alt="pastelaria-endereço" height="280px">
            <div class="txt">
                <h3>Venha nos conhecer!</h3>
                <br>
                <p>Av. Paulista, 303 - Centro, São Paulo - SP</p>
            </div>
        </div>
        <div class="contato">
            <img src="imagens/entre-em-contato.jpg" alt="entre-em-contato" height="280px">
            <div class="txt">
                <h3>Contate-nos!</h3>
                <br>
                <p>11 96350-0460</p>
                <p>contato@luizapasteis.com.br</p>
            </div>
        </div>
    </div>

</body>

</html>