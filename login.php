<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
                 
		$con = mysql_connect("localhost","root","root");
		mysql_select_db("web1", $con);
		$query = "SELECT * FROM usuario WHERE email='$_POST[email]'";
		$result = mysql_query($query, $con);
                $logado = 0;
		while($linha = mysql_fetch_array($result)) {

			if($linha["senha"]==md5($_POST[senha])) {
                             echo "e-mail:".$linha["email"]."</br>";
		             $logado = 1;
			     break;
                        }
		}
                if($logado==1)  {
                     echo "Bem vindo!!!</br>";
		     echo "<a href='listar.php'>Listar Usuarios</a></br>";
                     echo "<a href='cadastro_enquete.php'>Criar Enquete</a></br>";
 		     echo "<a href='listar_enquete.php'>Listar Enquete</a></br>";
		}
		else
                     echo "Senha ou usuario invalido!!!</br>";
		?>
		
		<p><a href="index.php">Home</a></p>
	</body>
</html>
