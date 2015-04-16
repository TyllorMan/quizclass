<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
		$con = mysql_connect("localhost","root","root");
		mysql_select_db("web1", $con);
		$query = "SELECT * FROM usuario";
		$result = mysql_query($query, $con);
		while($linha = mysql_fetch_array($result)) {
			echo "e-mail:".$linha["email"]."</br>";
			echo "senha:".$linha["senha"]."</br>";
			$query2 = "SELECT * FROM usuario_papel WHERE id_usuario=".$linha["id"];
			$result2 = mysql_query($query2, $con);
			while($linha2 = mysql_fetch_array($result2)) {
				$query3 = "SELECT * FROM papel WHERE id=".$linha2["id_papel"];
				$result3 = mysql_query($query3, $con);
				while($linha3 = mysql_fetch_array($result3)) {
					echo " - papel:".$linha3["nome"]."</br>";
					
				} 
			} 
			echo "</br>";
		}
		?>
		
		<p><a href="index.php">Home</a></p>
	</body>
</html>
