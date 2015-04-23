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
	<script>
		function carregarEnquetes()
		{
               
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
		    }
		  }
		xmlhttp.open("GET","novas_enquetes.php",true);
		xmlhttp.send();
		}
	</script>
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
		if(!$tinhaEnquete)  {
		   echo "<div id='myDiv'> - Nao existem enquetes novas</div>";

                } 
		echo "<button type='button' onclick='carregarEnquetes()'>Atualizar</button>";
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
	<script>
	   var myVar=setInterval(function () {
               carregarEnquetes()
             }, 10000);
        </script>
</html>
