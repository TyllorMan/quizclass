<?php 
   session_start();
?>
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
 			     $_SESSION["user"] = $linha["email"];
			     $_SESSION["user_id"] = $linha["id"];
			     $_SESSION['papeis']=array();
			     $query2 = "SELECT * FROM usuario_papel WHERE id_usuario=".$linha["id"];
			     $result2 = mysql_query($query2, $con);
 			     $count = 0;
			     while($linha2 = mysql_fetch_array($result2)) {
			        $query3 = "SELECT * FROM papel WHERE id=".$linha2["id_papel"];
				$result3 = mysql_query($query3, $con);
                               
				while($linha3 = mysql_fetch_array($result3)) {
				   
				   $_SESSION['papeis'][$count++]=$linha3["nome"];	
				   //echo " - papel:".$linha3["nome"]."</br>";
				   	
				} 
			     } 	
			     break;
                        }
		}
                if($logado==1)  {
                    
                     echo "Bem vindo!!!</br>";
		     include 'menu.php';
		}
		else
                     echo "Senha ou usuario invalido!!!</br>";
		?>
		
		<p><a href="index.php">Home</a></p>
	</body>
</html>
