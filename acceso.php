<?php
	
  session_start();
  include("conexion.php");
  $cnx=conexion();
	$usuario =$_POST['txtusu'];
	$clave =$_POST['txtclave'];

    $verifica=mysql_query("select * FROM administrativo WHERE User='$usuario' and Clave='$clave'",$cnx);
    
    $n=mysql_num_rows($verifica);
	if($n>0)
	   {
	   	
			#echo '<script>alert("BIENVENIDO AL SISTEMA")</script> ';
			
			$datos=mysql_fetch_array($verifica);//recuperar los datos del usuario logueado
			$tipo=$datos[1];
			$_SESSION['tipousr']=$tipo;//tipo de usuario recuperado
			$_SESSION['usuario']=$usuario;
      echo "<script>location.href='principal.html'</script>";
?> 
            
            <!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    <script type="text/javascript" src="script/jquery-1.3.1.min.js"></script>
    <script type="text/javascript">
     $( document ).ready(function() {
    $('#dialogo1').modal('toggle')
    });   
    </script>
</head>
<body>

  
</body>
</html> 
 <?php
			#echo "<meta http-equiv='Refresh' content='1; url=principal.html' />";
		}
		else
		{
			echo "<meta http-equiv='Refresh' content='0; url=index.html?msj=error en los datos' />";
		};

?>
