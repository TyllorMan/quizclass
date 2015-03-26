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
		}
		?>
		
		<p><a href="index.php">Home</a></p>
	</body>
</html>
