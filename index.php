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
			print_r($_SESSION["papeis"]);
                     echo "</br>Bem vindo!!!</br>";
		     include 'menu.php';
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
