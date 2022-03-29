<?php
	function conexion()
	{
		$conexio=mysql_connect("localhost","root","12345678");
		mysql_select_db("bdbarber");
		return($conexio);
	}
?>
