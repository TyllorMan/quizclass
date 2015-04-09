<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
		$con = mysql_connect("localhost","root","root");
		mysql_select_db("web1", $con);
		$query = "SELECT * FROM pergunta where id_enquete='$_GET[id]'";
		$result = mysql_query($query, $con);
		echo $_GET[titulo]."</br>";
		
		while($linha = mysql_fetch_array($result)) {
			
			echo $linha["texto"]." = ".$linha["votos"]."</br>";
		}
                
		?>
		
		<p><a href="index.php">Home</a></p>
	</body>
</html>
