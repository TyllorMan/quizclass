<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
		$con = mysql_connect("localhost","root","root");
		mysql_select_db("web1", $con);
		$query = "SELECT * FROM enquete";
		$result = mysql_query($query, $con);
		while($linha = mysql_fetch_array($result)) {
		   echo "<a href='detalhe_enquete.php?id=".$linha["id"]."&titulo=".$linha["titulo"]."'>id: ".$linha["id"]." - "."titulo: ".$linha["titulo"]."</a> - ";

echo "  <a href='resultado_enquete.php?id=".$linha["id"]."&titulo=".$linha["titulo"]."'>Resultado</a></br>";
		}
		?>
		
		<p><a href="index.php">Home</a></p>
	</body>
</html>
