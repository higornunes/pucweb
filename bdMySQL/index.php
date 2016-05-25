<html>
<head>
<title> PHP e Bancos de Dados </title>
<link rel="stylesheet" type="text/css" href="../css/exemploCookie.css" />
</head>
<body>
  
    <h1>
    <?php
      $hora = date("H");
      if($hora>18 && $hora<=23) echo "Boa noite!</h1>\n<br />";
      else if($hora>=0 && $hora <=11) echo "Bom dia!</h1>\n<br />";
      else if($hora>=12 && $hora <18) echo "Boa tarde!</h1>\n<br />";
    ?>
	</h1>
	<p> Se desejar, vá para a <a href='./consulta.php'>página de consulta</a></p>
    <form id="cadastro" action="index.php" method="post">
      Escolha um estado: <select name="estado">
    <?php

       if (isset($_POST["estado"])) 
	           $estado = $_POST["estado"];
       else $estado=-1;
       
       $conn = mysqli_connect("localhost", "root", "1234", "clientes");
       if(mysqli_connect_errno()) {
           echo "</select> \n <h1>ERRO NA CONEXÃO AO SERVIDOR DE BANCO DE DADOS!!!</h1>\n";
           echo mysqli_connect_error();
           die();
       }

    
       $consulta = "select * from estados";
       
       $query = mysqli_multi_query($conn, $consulta);	
       
       if(!$query){
          echo "</select> \n <h1>ERRO NA CONSULTA!!!</h1>\n";
           echo mysqli_error($conn);
           die();
       
       }
       
	    if ($resultado = mysqli_use_result($conn)) {
            while ($dados=mysqli_fetch_array($resultado)) {
                echo "<option ";
				if ($estado == $dados["estado_cod"]) echo "selected ";
				echo "value=\"".$dados["estado_cod"]."\">".$dados["estado_sigla"];
				echo "</option>\n";
            }
			mysqli_free_result($resultado);    
			}
		
	   
       
      ?>
      </select>
      <br />
      <?php

       $cid=-1;
       if($estado!=-1){

       if (isset($_POST["cidade"]))
         $cid = $_POST["cidade"];


         
       echo "Escolha uma cidade: <select name=\"cidade\">\n";
         
       $consulta = "select * from cidades where cidade_codestado=" .$estado;

       $query = mysqli_multi_query($conn, $consulta);

        if ($resultado = mysqli_use_result($conn)) {
            while ($dados=mysqli_fetch_array($resultado)) {
				echo "<option ";
				if ($cid == $dados["cidade_cod"]) echo "selected ";
				echo "value=\"".$dados["cidade_cod"]."\">".$dados["cidade_nome"];
				echo "</option>\n";
			}	
		}
		mysqli_free_result($resultado);    	
	  }
      ?>

      </select>
      <br />
      <?php
       if($cid!=-1){
         echo "Preencha os dados: <br />\n";
         echo "Nome: <input name=\"nomecli\" />\n<br />";
         echo "Telefone Celular: <input name=\"telcli\" />\n<br />";
         echo "E-mail: <input name=\"mailcli\" />\n<br />";
       }
      ?>
      <br />
      <?php
       if(isset($_POST["nomecli"])){
         $nome = $_POST["nomecli"];
         $cel = $_POST["telcli"];
         $mail = $_POST["mailcli"];

         $consulta = "insert into `clientes` (cliente_nome, cliente_codcidade, cliente_celular, cliente_email) values ('$nome', $cid, '$cel', '$mail')";

         $query = mysqli_multi_query($conn, $consulta);

        if(!$query) echo "<h1> Erro na inserção  </h1> $consulta <br /> \n ".mysqli_error($conn) ;
        else {
           echo "<h2> Registro inserido com sucesso </h2>\n";
           echo "<a href=\"index.php\"> Voltar </a>\n";
        }

       }
       else
       echo "<input type=\"submit\" value=\"Vai\" />";

	   mysqli_close ($conn);
      ?>

    
    </form>
  
  
  
  </div>
