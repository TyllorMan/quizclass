<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
		$con = mysql_connect("localhost","root","root");
		mysql_select_db("web1", $con);
		$query = "SELECT * FROM papel";
		$result = mysql_query($query, $con);
		while($linha = mysql_fetch_array($result)) {
			echo "id:".$linha["id"]."</br>";
			echo "nome:".$linha["nome"]."</br>";
		}
		?>
		
		<p><a href="index.php">Home</a></p>
	</body>
</html>
