<?php 
   session_start();
?>
<html>
	<head>
		<title>Quiz ClassRoom Service</title>		
	</head>
	<body>
		<?php
                
                  if($_SESSION["user"]!=null)  {
                    	echo "usuario:".$_SESSION["user"];
	
                     echo "</br>Bem vindo!!!</br>";
		     echo "<a href='listar.php'>Listar Usuarios</a></br>";
                     echo "<a href='cadastro_enquete.php'>Criar Enquete</a></br>";
 		     echo "<a href='listar_enquete.php'>Listar Enquete</a></br>";
	             echo "<a href='logout.php'>Sair</a></br>";
		  }
		  else
                     echo  "<form action='login.php' method='POST'>". 
                   "E-mail:<input type='text' name='email'/></br>".
                   "Senha:<input type='password' name='senha'/>".     
		   "<input type='submit' value='OK'/>".                   
		   "</form>".  	
		   "<a href='cadastro.php'>Cadastro</a>";

		?>
		
		
	</body>
</html>
