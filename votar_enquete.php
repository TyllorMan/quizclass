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

		$query = "SELECT * FROM pergunta where id='$_POST[enquete]'";
		$result = mysql_query($query, $con);
		$votos = 0;
		while($linha = mysql_fetch_array($result)) {
			
			$votos = intval($linha["votos"])+1;
			break;
		}
		


		$query = "UPDATE pergunta SET votos='$votos' WHERE id=$_POST[enquete]";
                
		if(mysql_query($query, $con)!=FALSE) {
                     
			$sql = "INSERT INTO usuario_votou (id_usuario, id_enquete) VALUES ('$_SESSION[user_id]','$_POST[id_enquete]')";
			if (!mysql_query($sql, $con)) {
				die('Error: ' . mysql_error());
			}
		        echo "Voto Computado com sucesso!";
                 }
		
		?>
		
		<p><a href="index.php">Home</a></p>
	</body>
</html>
