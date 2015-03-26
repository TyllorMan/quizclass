<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
		echo "Titulo:".$_POST[titulo];
                
		$con = mysql_connect("localhost","root","root");
		
		//seleciona o banco
		mysql_select_db("web1", $con);
		$senha_md5 = md5($_POST[senha]);
		$sql = "INSERT INTO enquete (titulo) VALUES ('$_POST[titulo]')";
		if (!mysql_query($sql, $con)) {
			die('Error: ' . mysql_error());
		}

		$query = "SELECT * FROM enquete where titulo='$_POST[titulo]'";
		$result = mysql_query($query, $con);
		$id_enquete = 0;
		while($linha = mysql_fetch_array($result)) {
			$id_enquete = $linha["id"];
			break;
		}
		

                $altCount=0;
		while($_POST["alt".$altCount]!=NULL) {
	 	     $texto = "alt".$altCount;
		     $sql = "INSERT INTO pergunta (texto,id_enquete) VALUES ('$_POST[$texto]', '$id_enquete')";
                     echo $_POST["alt".$altCount++]." ";
			if (!mysql_query($sql, $con)) {
			   die('Error: ' . mysql_error());
			}
		} 
		echo "</br>Enquete salva";
		
		
		?>
		
		<p><a href="index.php">Home</a></p>
	</body>
</html>
