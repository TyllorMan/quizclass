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
       
	
	echo "<a href='listar_enquete.php'>Listar Enquete</a></br>";

	if(testRole("ADMIN") || testRole("PROFESSOR")) {
	   echo "<a href='cadastro_enquete.php'>Criar Enquete</a></br>";
        }
        if(testRole("ADMIN")) {
                echo "<a href='listar.php'>Listar Usuarios</a></br>";
		echo "<a href='listar_papeis.php'>Listar Papeis</a></br>";
		echo "<a href='cadastrar_papel.php'>Cadastrar Papel</a></br>";
		echo "<a href='cadastrar_usuario_papel.php'>Associar Papel a Usuario</a></br>";
        }
	echo "<a href='logout.php'>Sair</a></br>";
?>
