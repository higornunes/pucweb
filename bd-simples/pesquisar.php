<?php
include_once("../modelos/cabecalho_bdsimples.html");
?>

    <div class="container">

      <div>
        <h1>Agenda Pessoal - Pesquisar contatos</h1>
        
		 <form role="form" method="post" action="./pesquisarContato.php">
			  <div class="form-group">
				<label for="InputNome">Nome:</label>
				<input type="text" class="form-control" id="InputNome" name="nomeContato" placeholder="Nome" autofocus>
				<p class="lead">Deixe em branco para mostrar todos os contatos.</p>
			  </div>
			  		  
			  
			  <button type="submit" class="btn btn-default">Pesquisar</button>
		 </form>

	 </div>

    </div><!-- /.container -->

<?php
include_once("../modelos/rodape_bdsimples.html");
?>