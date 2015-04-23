<?php
   session_start();
		function testRole($role) {
		     for($i=0;$i<sizeof($_SESSION["papeis"]);$i++) {
		          if($_SESSION["papeis"][$i]==$role) {  
			      return true;
		          } 
		     }
		     return false;
		}
?>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
		$con = mysql_connect("localhost","root","root");
		mysql_select_db("web1", $con);
		$query = "SELECT enquete.id, enquete.titulo FROM enquete LEFT JOIN usuario_votou ON enquete.id = usuario_votou.id_enquete AND usuario_votou.id_usuario =".$_SESSION["user_id"]." WHERE usuario_votou.id_enquete IS NULL";
                //echo $query;
		
		$result = mysql_query($query, $con);
                     
		$tinhaEnquete = FALSE;
                echo "</br>Enquetes Abertas</br>";
		while($linha = mysql_fetch_array($result)) {
		   $tinhaEnquete = TRUE;
		   echo "<a href='detalhe_enquete.php?id=".$linha["id"]."&titulo=".$linha["titulo"]."'>id: ".$linha["id"]." - "."titulo: ".$linha["titulo"]."</a> - ";

		   echo "  <a href='resultado_enquete.php?id=".$linha["id"]."&titulo=".$linha["titulo"]."'>Resultado</a></br>";
                 }
		if(!$tinhaEnquete) 
		   echo " - Nao Existem Enquetes Abertas</br>";

		$query = "SELECT enquete.id, enquete.titulo, usuario_votou.id_enquete FROM enquete INNER JOIN usuario_votou ON enquete.id = usuario_votou.id_enquete AND usuario_votou.id_usuario =".$_SESSION["user_id"];
		//echo $query;
		$result = mysql_query($query, $con);
		echo "</br>Enquetes respondidas</br>";
		while($linha = mysql_fetch_array($result)) {
		   if(testRole("ADMIN")) { 
		      echo "<a href='detalhe_enquete.php?id=".$linha["id"]."&titulo=".$linha["titulo"]."'>id: ".$linha["id"]." - "."titulo: ".$linha["titulo"]."</a> - ";

		   echo "  <a href='resultado_enquete.php?id=".$linha["id"]."&titulo=".$linha["titulo"]."'>Resultado</a></br>";	
		   }   
                   else {
			echo "id: ".$linha["id"]." - "."titulo: ".$linha["titulo"]." - ";
		      echo "  <a href='resultado_enquete.php?id=".$linha["id"]."&titulo=".$linha["titulo"]."'>Resultado</a></br>";
		   }      
		    
		}
		?>
		
		<p><a href="index.php">Home</a></p>
	</body>
</html>
