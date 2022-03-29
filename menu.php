<?php
session_start();
if (!empty($_SESSION['usuario']))
{
?>
<html>
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

<body class="p-3 mb-2 bg-secondary text-white">
  

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<center>
<div><img src="login/images/logo.jpg" width="70" height="70" ></div></center>
   
<font color="white" face="timis,serif" >
<div>
<center>MENU

    <?php 
       include("conexion.php");
       $cnx=conexion();
       echo $_SESSION['tipousr']."<hr>";
       $tipousr=$_SESSION['tipousr'];
       $opciones=mysql_query("select * FROM menu m, usuariomenu um 
       	                      where m.IdMenu=um.IdMenu and um.CodCargo='$tipousr'",$cnx);
       while ($fopcion=mysql_fetch_array($opciones)) {
       	     echo "<a href='$fopcion[2]' target='contenido'><button class='btn btn-dark btn-sm col-md-8' >$fopcion[1]<i class='fa fa-tags' aria-hidden='true'></i></button></a><br>";
       }

    ?>
	</center>
  
</div>

  <style type="text/css">
   body div a  { text-decoration: none;
              color: white ;
         border: 1px solid white;
        
        padding: 1px 1px;
       
        display: block;
     }
     div :hover{ 
                  background-color: #727272;
               }
 </style>

</body>
</html>
<?php
}
else
{
	echo "Debes loguearte....";
}
?>
