<?php
 function conn_mysql(){

   $servidor = 'localhost';
   $porta = 3306;
   $banco = "contatos";
   $usuario = "root";
   $senha = "";
   
      $conn = new PDO("mysql:host=$servidor;
	                   port=$porta;
					   dbname=$banco", 
					   $usuario, 
					   $senha);
      return $conn;
   }
?>