<?php
include_once("../modelos/cabecalho_login.html");
?>

    <div class="container">

      <div>
        
        
		 <form role="form" method="post" action="./cadastroNovoUsuario.php" class="form-signin">
		 <h3 class="form-signin-heading">Agenda Pessoal<br> Cadastro de Usuário</h3>
			  <div class="form-group">
				<label for="InputNome">Nome Completo:</label>
				<input type="text" class="form-control" id="InputNome" name="nomeCompleto" placeholder="Nome completo" required autofocus>
			  </div>
			  <div class="form-group">
			  <label for="InputLogin">Login:</label>
				<input type="text" class="form-control" id="InputLogin" name="nomeUsuario" placeholder="Login desejado" required>
			  </div>
			  <div class="form-group">
				<label for="InputSenha">Senha:</label>
				<input type="password" class="form-control" id="InputSenha" name="passwd" placeholder="Senha (4 a 8 caracteres)">
			  </div>
			  <div class="form-group">
				<label for="InputSenhaConf">Confirmação de Senha:</label>
				<input type="password" class="form-control" id="InputSenhaConf" name="passwd2" placeholder="Confirme a senha">
			  </div>

			  <button type="submit" class="btn btn-primary">Cadastrar</button>
		 </form>

	 </div>

	  
	  
    </div><!-- /.container -->

<?php
include_once("../modelos/rodape_bdsimples.html");
?>