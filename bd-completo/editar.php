<?php
require_once("./authSession.php");  
require_once("./conf/confBD.php");
include_once("../modelos/cabecalho_bdcompleto.html");
?>
<div class="container">
      <div class="starter-template">
        <h3 class="sub-header">Agenda Pessoal - Editar Contato</h3>    
      </div>
<?php
try{
	// se não foram passados 3 parâmetros na requisição, desvia para a mensagem de erro
	// "previne" acesso direto à página
	if(count($_GET)!=1){
		header("Location:./erroEdicao.php");
		die();
	}        
	
	$nomeUsuario = utf8_encode(htmlspecialchars($_SESSION['nomeUsuario']));
	$nomeContato = utf8_encode(htmlspecialchars($_GET['contato']));
	
	$conexao = conn_mysql();
		

		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM contatos WHERE nomeUsuario=? AND nomeContato=?';
		
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);					  
				
		//executa a sentença SQL com o valor passado por parâmetro
		$pesquisar = $operacao->execute(array($nomeUsuario, $nomeContato));
		
		//captura TODOS os resultados obtidos
		$resultados = $operacao->fetchAll();
?>
		 <form role="form" method="post" action="./editarContato.php">
			  <div class="form-group">
				<label for="InputNome">Nome:</label>
				<input type="text" class="form-control" id="InputNome" name="nomeContato" required autofocus value="<?php echo $resultados[0]['nomeContato']?>">
			  </div>
			  <div class="form-group">
				<label for="InputEmail">E-mail:</label>
				<input type="email" class="form-control" id="InputEmail" name="emailContato" value="<?php echo $resultados[0]['emailContato']?>">
			  </div>
			  
			  <div class="form-group">
				<label for="InputTel">Telefone:</label>
				<input type="text" class="form-control" id="InputTel" name="telContato" value="<?php echo $resultados[0]['telContato']?>">
			  </div>
			  
			  
			  <button type="submit" class="btn btn-default">Confirmar</button>
		 </form>

	 </div>

	  
	  
    </div><!-- /.container -->
<?php
}		//fim do try
catch (PDOException $e)
{
    // caso ocorra uma exceção, exibe na tela
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
}

include_once("../modelos/rodape_bdcompleto.html");
?>