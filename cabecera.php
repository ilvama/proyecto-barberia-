<?php
session_start();
?>
<html>
<body  <!--bgcolor="#6699CC"-->  
	<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



	<meta charset='utf-8'>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
	<meta name="keywords" content="Autozone iphone web template,  Android  web template, Smartphone web template, free web designs for Nokia, Samsung, LG,  sony ericsson, Motorola web design" />
	<link href='//fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
	<script src="js/modernizr.js"></script>
	<script src="js/responsive-nav.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
	</head>
	<body>



<font color="black" face="timis,serif"  >
<center><h1 class="agile-head" style="color: white">SISTEMA DE CONTROL DE RESERVA Y VENTA " COUNTRY BARBER SHOP STYLES"</h1></center>
   <div style="color: yellow" align="center">
   	<h5>
    <?php 
	  echo Bienvenido." ".$_SESSION['usuario']." ".$_SESSION['tipousr'];
	
    ?>
	</h5>
    </div>
</font>
</body>
</table>
<div align="right" ><a href="frmcambiarclave.php" target="_top" style="width: 200px;height: 150px" ><button class="btn btn-primary btn-sm " >CUENTA<i class="fa fa-user-o" aria-hidden="true"></i></button></a><a href="salir.php" target="_top" style="width: 200px;height: 150px"><button class="btn btn-danger btn-sm" >SALIR <i class="fa fa-power-off" aria-hidden="true"></i></button></a></div>



  

 

</html>