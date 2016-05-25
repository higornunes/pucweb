<?php

if(isset($_COOKIE['loginAutomatico'])){
   header("Location: ./VerificarLogin.php");
}
else if(isset($_COOKIE['loginAgenda']))
	$nomeUser = $_COOKIE['loginAgenda'];
	else $nomeUser="";
	
include_once("../modelos/cabecalho_login.html");
?>

    <div class="container">

      <div class="starter-template">
        <form class="form-signin" role="form" method="post" action="./verificarLogin.php">
        <h3 class="form-signin-heading">Agenda Pessoal - Login</h3>
        <input type="text" class="form-control" placeholder="Login" name="login" value="<?php echo $nomeUser?>"required autofocus>
        <input type="password" class="form-control" placeholder="Senha" name="passwd" required>
        <label>
          <input type="checkbox"  name="lembrarLogin" value="loginAutomatico"> Permanecer conectado
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
		<br>
		<button class="btn btn-lg btn-success btn-block" type="button" onclick="javascript:window.location.href='./cadastroUsuario.php'">Cadastrar-se</button>
      </form>
      </div>

    </div><!-- /.container -->

<?php
include_once("../modelos/rodape_login.html");
?>