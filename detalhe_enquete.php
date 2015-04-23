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
		echo "<form action='votar_enquete.php' method='POST'>";
		while($linha = mysql_fetch_array($result)) {
			
			echo "<input type='radio' name='enquete' value='".$linha["id"]."'>".$linha["texto"]."</br>";
		}
                  echo "<input type='hidden' name='id_enquete' value='".$_GET[id]."'/>";  
		
                  echo "<input type='submit' value='Votar'/>";   
                  echo "</form>"; 
		?>
		
		<p><a href="index.php">Home</a></p>
	</body>
</html>
