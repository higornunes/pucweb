<?php
require_once("./conf/confBD.php");
include_once("../modelos/cabecalho_bdsimples.html");
?>
	
	<div class="container">

      <div>
<?php

try
{

	// se não foi passado 1 parâmetro via POST, desvia para a mensagem de erro
	// "previne" acesso direto à página	
	if(count($_POST)!=1){
		include("./erroPesquisa.php");
		die();
	}
	else{
	    // instancia objeto PDO, conectando no mysql
		$conexao = conn_mysql();
		
		//captura valores do vetor POST
		//utf8_encode para manter consistência da codificação utf8 nas páginas e no banco
		$nomeBusca = utf8_encode(htmlspecialchars($_POST['nomeContato']));
				
		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM contato ';

		//se existe um nome para busca... 
		if(strlen($nomeBusca)>0){
		    $nomeBusca = '%'.$nomeBusca.'%';		
			$SQLSelect = $SQLSelect.'WHERE nomeContato like ?';	//anexa a restrição à sentença SQL
		}
		
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);					  
				
		//executa a sentença SQL com o valor passado por parâmetro
		$pesquisar = $operacao->execute(array($nomeBusca));
		
		//captura TODOS os resultados obtidos
		$resultados = $operacao->fetchAll();
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;
		
		// se há resultados, os escreve em uma tabela
		if (count($resultados)>0){		
			echo '<table class="table table-striped">';	
			echo '<thead><tr><th colspan="3">Contatos encontrados</th></tr></thead>';
			echo '<thead><tr><th>Nome</th><th>e-mail</th><th>Telefone</th></tr></thead>';
			echo '<tbody>';
			foreach($resultados as $contatosEncontrados){		//para cada elemento do vetor de resultados...
			
				//em cada 'linha' do vetor de resultados existem elementos com os mesmos nomes dos campos recuperados do SGBD
				echo "\n<tr><td>".utf8_decode($contatosEncontrados['nomeContato'])."</td>";
				echo "<td>".utf8_decode($contatosEncontrados['emailContato'])."</td>";
				echo "<td>".utf8_decode($contatosEncontrados['telContato'])."</td></tr>";		
			}
			echo '</table>';
		}
		else{
			echo"\n<h1>Não foram encontrados contatos com os dados fornecidos</h1>";
		}
		
		echo "\n<p class=\"lead\"><a href=\"./pesquisar.php\">Realizar nova busca</a></p>\n";
		echo"\n<hr>";	
	   die();  
    }
}
catch (PDOException $e)
{
    // caso ocorra uma exceção, a exibe na tela
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
}
include_once("../modelos/rodape_bdsimples.html");
?>
