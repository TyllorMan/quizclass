<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
		$con = mysql_connect("localhost", "root", "root");
		if (!$con) {
			//se der erro exibe msg
			die('Could not connect: ' . mysql_error());
		}
		//seleciona o banco
		mysql_select_db("web1", $con);
		$senha_md5 = md5($_POST[senha]);
		$sql = "INSERT INTO usuario (email, senha ) VALUES ('$_POST[email]', '$senha_md5')";
		if (!mysql_query($sql, $con)) {
			die('Error: ' . mysql_error());
		}
		echo "Usuario salvo";
		echo "<p><a href=\"index.php\">Home</a></p>";		
		mysql_close($con);
		?>
		
	</body>
</html>
