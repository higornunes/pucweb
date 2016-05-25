<?php
   $valorTeste = $_COOKIE["userId"];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
 <link rel="stylesheet" href="../css/sisCookie.css" type="text/css">
 <title>Criando  cookies</title>

</head>
<body>
<div class="aviso">
   <p> Cookie recuperado:
  <?php
     echo "valor: $valorTeste";
  ?>
   </p> <p><a href="./criaCookie.php"> Clique aqui voltar</a></p>
</div>

</body>
</html>
