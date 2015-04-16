<html>
	<head>
		<title></title>
	</head>
	<body>
<?php
	$con = mysql_connect("localhost","root","root");
	mysql_select_db("web1", $con);

	$nome = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
                 print_r($_POST);
	  	$id_usuario = test_input($_POST["id_usuario"]);
		$id_papel = test_input($_POST["id_papel"]);
		
		$con = mysql_connect("localhost", "root", "root");
		if (!$con) {
			//se der erro exibe msg
			die('Could not connect: ' . mysql_error());
		}
		//seleciona o banco
		mysql_select_db("web1", $con); 
	
		$sql = "INSERT INTO usuario_papel (id_usuario, id_papel) VALUES ('$id_usuario','$id_papel')";
		if (!mysql_query($sql, $con)) {
			die('Error: ' . mysql_error());
		}
		echo "Papel associado a usuario";
		echo "<p><a href=\"index.php\">Home</a></p>";		
		mysql_close($con);
			
	
	} else {  ?>
		Associar Papel a Usuario
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
			Papel
			 <select name="id_papel">
			<?php
				
				$query = "SELECT * FROM papel";
				$result = mysql_query($query, $con);
				while($linha = mysql_fetch_array($result)) {
					echo "<option value=".$linha["id"].">".$linha["nome"]."</option>";
					
				}
			?>
 			</select> 
			<select name="id_usuario">
			<?php
				
				$query = "SELECT * FROM usuario";
				$result = mysql_query($query, $con);
				while($linha = mysql_fetch_array($result)) {
					echo "<option value=".$linha["id"].">".$linha["email"]."</option>";
					
				}
			?>
		
			</select> 
			<input type="submit" value="Cadastrar"/>
		</form>
         
     <?php
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>

		
	</body>
</html>
