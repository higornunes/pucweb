<?php

   setcookie("userId", "aluno123", time()-1000000);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
 <link rel="stylesheet" href="../css/sisCookie.css" type="text/css" />
 <title>Criando cookies</title>
</head>
<body>
<div class="aviso">
   <p> Cookie criado. </p>
   <p> <a href="./recupCookie.php"> Clique aqui </a> para testar a sua recuperação</p>
</div>

</body>
</html>
