<?php
   if(isset($_COOKIE["senha"])){ //se existir um cookie de senha, pula direto para a página de verificação 
     include("./verifica.php");  //"login automático"
     die();
   }
?>
<!DOCTYPE html>
<html>
<head>
 <link rel="STYLESHEET" href="../css/sisCookie.css" type="text/css" />
 <title>Aula - Login</title>
</head>
<body>

<div class="aviso" id="divlogin">
  <form name="formlogin" action="verifica.php" method="post">
        <label class="lblform" for="login">Login: </label>
               <input type="text" name="login" value="
<?php
   if(isset($_COOKIE["login"])) echo $_COOKIE["login"];		//se existe um cookie de login, o coloca como valor da input
   if(isset($_COOKIE["cidade"])) $cid = $_COOKIE["cidade"]; //captura o valor do cookie de cidade
   else $cid=-1;
?>
"><br/>
        <label class="lblform" for="senha">Senha: </label>
               <input type="password" name="senha"><br/>
        <label class="lblform" for="cidade">Cidade: </label>
        <select size="1" name="cidade" id="cidade">
           <option <?php if($cid==1) echo "selected ";?> value="1">Belo Horizonte</option>  
           <option <?php if($cid==2) echo "selected ";?> value="2">Rio de Janeiro</option>
           <option <?php if($cid==3) echo "selected ";?> value="3">S&atilde;o Paulo</option>
        </select>
         
         <hr />
        <input type="radio" name="lembrar" value="lmblog" id="lemblog" />
        <label  for="lemblog">Lembrar meu login </label>
               <br/>
        <input type="radio" name="lembrar" value="lmbsenha" id="lembsenha" />
        <label for="lembsenha">Fazer login autom&aacute;tico </label>
	<hr />        
     <p style="text-align: center;"><a href="javascript:document.formlogin.submit()">Entrar</a></p>

  </form>
</div>

</div>
</body>
</html>
