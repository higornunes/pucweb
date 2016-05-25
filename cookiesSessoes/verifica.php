<?php
    session_start();

      if(isset($_POST["login"])){		//existe um login enviado via POST (formul�rio)
            $log = $_POST["login"];
            $senha = $_POST["senha"];
			$cid = $_POST["cidade"];
	        $estilo = $_POST["estilo"];

         setcookie("cidade", $cid); //guarda o valor da cidade at� o fim da sess�o
      }
      elseif(isset($_COOKIE["senha"])){ 	//existe um cookie com nome senha --> login autom�tico
            $log = $_COOKIE["login"];
            $senha = $_COOKIE["senha"];
		   }
        else{
	  	       include("errologin.html");
               die();
		}

		//TODO: verificar login e senha em alguma fonte, por exemplo, no banco de dados
		//
		//
		////////////////////////////////////////////////////////////////////////////////

		if (isset($_POST["lembrar"])) {
               $lembrar = $_POST["lembrar"];
               if($lembrar == "lmbsenha") setcookie("senha", $senha, mktime(0,0,0,12,31,2014));  //guarda a senha em um cookie
               setcookie("login", $log, time()+60*60*24*90);  //guarda o login em um cookie
        }

     $_SESSION['auth']=true;
     $_SESSION['nameUser']='Aluno 123';

        header("Location:./principal.php"); 				//redireciona para a p�gina principal do sistema
?>
