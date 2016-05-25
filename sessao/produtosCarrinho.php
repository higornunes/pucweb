<?php
    session_start();

    function sortear($limite){
        return rand(0,$limite-1);
    }

    $produtos = array(  "Pen drive 32GB", 
                        "Memória RAM 8GB",
                        "HD externo 2TB",
                        "Placa de vídeo 4GB",
                        "Leitor de Blu-ray",
                        "Smartphone geração 7",
                        "TV UltraHD"
                        );

?>

<!DOCTYPE html>
<html>
<head>
	<title> Sessões em PHP </title>
	<link rel="stylesheet" href="./basico.css">
	<meta charset="utf-8">
</head>

   <body>
      <form name="meuForm" action="./salvarProdutos.php" method="post">
         <p>Escolha um produto e uma quantidade: &nbsp;
    	 <select name="prodCod">         
<?php
        for($i=0;$i<3;$i++){     
            $sorteio = sortear(count($produtos));
            echo '<option value="'.$sorteio.'">'.$produtos[$sorteio].'</option>';
        }
?>
         </select>
             &nbsp; &nbsp; <input type="number" name="quantos">		 </p>
         <p>
			&nbsp; &nbsp;<input  type = "submit" value ="Salvar">
		 </p>
          
      </form>
        <p>
			Verificar o <a href="./consultarCarrinho.php">carrinho de compras.</a>
		 </p>
   </body>
   
 </html>


