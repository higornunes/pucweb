<?php
   foreach($_COOKIE as $nome=>$valor){
         setcookie($nome, "", time()-1000);   //apaga todos os cookies dispon�veis para este dom�nio
	 }
?>

<HTML>
<HEAD>
 <TITLE>Verificando login...</TITLE>
 <link rel="STYLESHEET" href="../css/sisCookie.css" type="text/css" />
 <meta http-equiv="refresh" content="2; url=./principal.php" />
</HEAD>
<BODY>
<div class="aviso">
    Cookies apagados ...
</div>
</BODY>
</HTML>
