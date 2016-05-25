<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title> PHP e Bancos de Dados </title>
<link rel="STYLESHEET" href="../css/exemploCookie.css"  />
</head>
<body>
  
    <h1>
    <?php
      $hora = date("H");
      if($hora>18 && $hora<=23) echo "Boa noite! Consulte os clientes</h1>\n<br />";
      else if($hora>=0 && $hora <=11) echo "Bom dia!</h1>\n<br />";
      else if($hora>=12 && $hora <18) echo "Boa tarde!</h1>\n<br />";
    ?>
	</h1>
	<p> Se desejar, vá para a <a href='./index.php'>página principal</a></p>
    <form id="cadastro" action="consulta.php" method="post">
      Escolha um estado: <select name="estado">
    <?php

       if (isset($_POST["estado"])) $estado = $_POST["estado"];
       else $estado=-1;
       echo $estado;
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
       
       if(!$query){
          echo "</select> \n <h1>ERRO NA CONSULTA!!!</h1>\n";
           echo mysqli_error($conn);
           die();
       
       }

		if ($resultado = mysqli_use_result($conn)) {
            while ($dados=mysqli_fetch_array($resultado)) {
				echo "<option ";
				if ($cid == $dados["cidade_cod"]) echo "selected ";
				echo "value=\"".$dados["cidade_cod"]."\">".$dados["cidade_nome"];
				echo "</option>\n";
			}
		}
	   }
      ?>

      </select>
      <br />
      <hr>
      <?php
	   if($cid!=-1){

        $consulta = "select * from clientes, cidades, estados where cliente_codcidade = cidade_cod ";
        $consulta .= " and cidade_codestado = estado_cod and cidade_cod = ".$cid;


       $query = mysqli_query($conn, $consulta, MYSQLI_STORE_RESULT);	
       
       if(!$query){
          echo "</select> \n <h1>ERRO NA CONSULTA!!!</h1>\n";
           echo mysqli_error($conn);
           die();
       
       }
	   
	   
        $cont = mysqli_num_rows($query);
        if($cont==0) echo "<h1> Nada encontrado </h1> <br> ";
        else{
          while ($dados=mysqli_fetch_array($query)) {
           echo "Nome: " . $dados["cliente_nome"]. "<br />\n";
           echo "Celular: " . $dados["cliente_celular"]. "<br />\n";
           echo "E-mail: " . $dados["cliente_email"]. "<br />\n";
           echo "<hr>\n";
         }
        }
       
	   mysqli_close ($conn);
	  }
      ?>
      <input type="submit" value="Vai"> &nbsp; &nbsp;
      <a href="consulta.php"> Voltar </a>
      </body>
	  </html>
      
