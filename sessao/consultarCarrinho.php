<?php
   session_start();
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
       <p>Produtos atualmente no Carrinho: </p>
       <ol>
<?php      
        if(!empty($_SESSION['produtos'])){   
            $quant = count($_SESSION['produtos']);
        
            for($i=0; $i<$quant; $i++){
                $codProduto = $_SESSION['produtos'][$i]; 
                echo '<li>';
                echo $produtos[$codProduto].' - ';
                echo $_SESSION['quantidades'][$i].' unidades.</li>';
            
            }   
        }
           
?>       
       </ol>
       <p>
           Continuar <a href="./produtosCarrinho.php">compras</a> ou <a href="./esvaziarCarrinho.php">esvaziar</a> o carrinho.
		 </p>
    </body>