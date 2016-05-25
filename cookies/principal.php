<!DOCTYPE html>
<html lang="pt-BR">
<head>
<link rel="stylesheet" href="../css/sisCookie.css" type="text/css" >
 <title>Sistema Cookies</title>
</head>
<body>
<div id="cabecalho">
 <h1> Cookies com PHP </h1>
</div>

<div id="principal">
   <div class="saudacao">
     <?php
     
        echo "<p>Bem vindo!!!</p>\n";
        echo "<p>Escolha sua op&ccedil;&atilde;o de navega&ccedil;&atilde;o no menu. </p>\n";
     ?>
   </div>
</div>

<div id="menu">
  <ul>
  <li class="menuprinc"> Produtos </li>
  <li class="menusub"> <a href="#">Procure</a> </li>
  <li class="menusub"> <a href="#">Carrinho de Compras</a></li>
  <li class="menuprinc"> Outras Fun&ccedil;&otilde;es </a></li>
  <li class="menusub"> <a href="./apaga.php">Apagar cookies </a></li>
  <li class="menusub"> <a href="./index.php">Sair </a></li>
  </ul>
</div>
</body>
</html>
