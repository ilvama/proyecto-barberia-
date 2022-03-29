<?php
session_start();
if (!empty($_SESSION['usuario']))
{
        include ("libreria.php");
        $cnx=conectar();
?>
<html>
<head>
	<title>Cambio de Clave de Acceso ...</title>
</head>
	
<body>
<h1>Datos Usuario</h1>
<?php 
$usuario=$_SESSION['usuario'];
$cons_usuario=mysql_query("select * from tusuario where idusuario='$usuario'");
$datosusr=mysql_fetch_array($cons_usuario);
echo "<b>Usuario: </b>".$datosusr[2]."<br>";
echo "<b>Tipo de Usuario: </b>".$datosusr[3]."<br>";
 ?>.
	
	
        <form name='frmclave' method="GET" action='pr_cambiarclave.php'>
	Clave Anterior:
        <input type='password' name='txtclvant' ><br>
        Nueva Clave:
	<input type='password' name='txtclvnueva' ><br>
	Confirme Clave:
	<input type='password' name='txtclvnueva2' ><br>
        <input type='Submit' value='Proceder'>
	</form>
</body>
</html>

<?php
}
else
{
	
echo "Usted debe loguearse";
};
?>
