<html>
	<head>
		<title></title>
	</head>
	<body>
<?php
	$nome = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  	$nome = test_input($_POST["nome"]);
		
		$con = mysql_connect("localhost", "root", "root");
		if (!$con) {
			//se der erro exibe msg
			die('Could not connect: ' . mysql_error());
		}
		//seleciona o banco
		mysql_select_db("web1", $con); 
	
		$sql = "INSERT INTO papel (nome ) VALUES ('$nome')";
		if (!mysql_query($sql, $con)) {
			die('Error: ' . mysql_error());
		}
		echo "Papel Cadastrado";
		echo "<p><a href=\"index.php\">Home</a></p>";		
		mysql_close($con);
			
	
	} else {  ?>
		Cadastrar Papel
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
			nome: <input type="text" name="nome" />
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
