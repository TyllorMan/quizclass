<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>
Ate a próxima! 
:D
</br>
<a href="index.php">Ir para o inicio</a>
</body>
</html> 
