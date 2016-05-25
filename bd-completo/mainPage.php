<?php
require_once("./authSession.php");
require_once("./conf/confBD.php");
include_once("../modelos/cabecalho_bdcompleto.html");
?>

    <div class="container">

      <div class="starter-template">
        <h3 class="sub-header">Agenda Pessoal - <?PHP echo utf8_decode($_SESSION['nomeCompleto']);?></h3>    
      </div>
	  
	   <form class="navbar-form " role="form" method="post" action="./mainPage.php">
            <div class="form-group">
              Filtrar: <input type="text" placeholder="Nome" name="filtro" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-sm btn-default">Filtrar</button>
	   </form>
	  
<?php
try{
	// instancia objeto PDO, conectando no mysql
	$conexao = conn_mysql();
		
		$nomeUser = utf8_encode($_SESSION['nomeUsuario']);
				
		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM contatos WHERE nomeUsuario=?';
	
	   if(!empty($_POST['filtro'])){
	         $nomeBusca = utf8_encode(htmlspecialchars($_POST['filtro']));
			 $nomeBusca = "%".$nomeBusca."%";
			 $SQLSelect .= ' AND nomeContato like ?';
		}
			
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);					  
		if(!empty($_POST['filtro'])){				
			//executa a sentença SQL com o valor passado por parâmetro
			$pesquisar = $operacao->execute(array($nomeUser, $nomeBusca));
		}
		else
			$pesquisar = $operacao->execute(array($nomeUser));
		//captura TODOS os resultados obtidos
		$resultados = $operacao->fetchAll();
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;
		
		// se há resultados, os escreve em uma tabela
		if (count($resultados)>0){		
			echo '<table class="table table-striped">';	
			echo "<thead><tr><th>Nome</th><th>e-mail</th><th>Telefone</th><th><a href=\"./inserir.php\"> <button type=\"button\" class=\"btn btn-xs btn-success\">Novo</button></a></th></tr></thead>";
			echo '<tbody>';
			foreach($resultados as $contatosEncontrados){		//para cada elemento do vetor de resultados...
				
				//em cada 'linha' do vetor de resultados existem elementos com os mesmos nomes dos campos recuperados do SGBD
				echo "\n<tr><td>".utf8_decode($contatosEncontrados['nomeContato'])."</td>";
				echo "<td>".utf8_decode($contatosEncontrados['emailContato'])."</td>";
				echo "<td>".utf8_decode($contatosEncontrados['telContato'])."</td>";		
				echo "<td><a href='./apagarContato.php?contato=".htmlspecialchars($contatosEncontrados['nomeContato'])."'><button type=\button\ class=\"btn btn-xs btn-danger\">Apagar</button></a>";		
				echo "&nbsp;&nbsp;<a href='./editar.php?contato=".htmlspecialchars($contatosEncontrados['nomeContato'])."'><button type=\button\ class=\"btn btn-xs btn-primary\">Editar</button></a></td></tr>";		
			}
			echo '</table>';
		}
		else{
			echo'<div class="starter-template">';
			echo"\n<h3 class=\sub-header\>Nenhum contato encontrado.</h3>";
			echo'</div>';
		}
	} //try
	catch (PDOException $e)
	{
    // caso ocorra uma exceção, exibe na tela
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
	}
	
?>	
	  
    </div><!-- /.container -->

<?php
include_once("../modelos/rodape_bdcompleto.html");
?>