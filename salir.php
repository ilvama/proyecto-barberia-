<?php
session_start();
unset($_SESSION['tipousr']);
unset($_SESSION['usuario']);
session_destroy();
//header('Location:index.php');
echo "Usted esta saliendo del Sistema...";
echo "<meta http-equiv='Refresh' content='0; url=index.html'/>";
?>