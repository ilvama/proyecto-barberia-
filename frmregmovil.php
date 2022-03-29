<?php
session_start();
if (!empty($_SESSION['usuario']))
{
//esto en caso de que nos hemos logueado
    include("conexion.php");
        $cnx=conexion();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
  <title>SISTEMA </title>


  <script type="text/javascript" src="script/jquery-1.3.1.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#chofer').change(function(){
      var idchofer=$('#chofer').val();
      $.ajax({
        type:'POST',
        url: 'cmbchofer.php',
        data :{
          idchofer:idchofer
        },
        success : verchofer
      });
      return false;
    });
    function verchofer(res){
      $('#aquichofer').html(res);
    }
  });
</script>

</head>
<body background="" style="background-attachment: fixed" >
   
  <center><div class="tit"><h2 style="color: #0000FF; ">REGISTRAR NUEVO PERSONAL </h2>
    <center><div class="Ingreso">

  <table border="0" align="center" valign="middle">
    <tr>
    <td width="300">
   
   
  <fieldset>
    <legend  style="font-size: 18pt"><b></b></legend>
    
    
    <center><h2>LISTA DE CLIENTES</h2></center>




<table id="example" class="display" style="width:100%" class='table table-bordered table-dark'>
        <thead>
            <tr>
          <tr>
          <th>Id </th>
          <th>Ci</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Cargo</th>
          
          
          
          
          <th >Opciones</th>
               
            </tr>
        </thead>
        <tbody>

        <?php 

$consulta=mysql_query("SELECT usuario.id,usuario.Ci,usuario.Nombre,usuario.Apellido,usuario.cargo
                                              FROM usuario"
                                              );
while ($row=mysql_fetch_array($consulta)) {
  # code...


    echo "  <tr>
               <td>".$row[0]."</td>
                <td>".$row[1]."</td>
                <td>".$row[2]."</td>
                <td>".$row[3]."</td>
                <td>".$row[4]."</td>
                <td>".$row[5]."</td>
                
                
                
                   <th>
              <a class='btn btn-info' href='frmservicioregular.php?idc=$row[0]' >Asignar Pedido <i class='glyphicon glyphicon-log-in icon-white'></i></a>

              <a class='btn btn-danger' href='frmmodificachofer.php?idc=$datos[0]'>Modificar   <i class='glyphicon glyphicon-edit icon-white'></i></a>
     
     

              </th>
               </tr>";
       } 

       ?>
      
                </tbody>
    </table>
    <center>
      <input type="button" value="Nuevo" class='btn btn-primary'>
    </center>
    
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <h2>Seleccionar chofer</h2>

       <div class="form-group">
         <label style="font-size: 14pt"><b>Chofer</b></label>
         <input type="text" name="chofer" id="chofer" list="lstlista" placeholder="Seleccionar Chofer">
         <datalist id="lstlista" >
                <?php
                    $tipos=mysql_query("select * from chofer, personal where chofer.CodPer=personal.CodPer");
                    while ($ftipo=mysql_fetch_array($tipos)) {
                            echo "<option value='$ftipo[1]'>$ftipo[3]</option>";
                    }
                ?>
         </datalist>
                
         
         <!--<div align="right" >\-->
         <a href='frmregchofer.php' target='contenido'><button class="btn btn-primary btn-sm" >NUEVO</button></a>
         <!--</div>\-->
         <div id="aquichofer">
           
         </div>
    </td>
    <td width="300">
      
    </td>
    <td width="300">
      
    </td>
    </tr>
  </table>
  <form name="frmchofer" method="GET" action='pr_regchofer.php' enctype="multipart/form-data">
  <table>
      <tr>
      
      <fieldset>
      <legend  style="font-size: 18pt"><b></b></legend>
       <h2>Datos del automovil</h2>
      <td width="300">
   <div class="form-group">
      <label style="font-size: 14pt; "><b>Nro. Placa</b></label>
      <input type="text" name="txtplaca" class="form-control" placeholder="Ingresa Nro. de Placa" />
    </div>
    </td> 
    <td width="300">  
    <div class="form-group">
      <label style="font-size: 14pt"><b>Nro. Chasis</b></label>
      <input type="text" name="txtchasis" class="form-control"  placeholder="Ingresa Nro. de Chasis" />
    </div>
    </td>
    <td width="300">
    <div class="form-group">
      <label style="font-size: 14pt"><b>Color</b></label>
     <select>
        <option value="0">Seleccionar</option>
        <?php
                    $tipos=mysql_query("select * from color");
                              while ($ftipo=mysql_fetch_array($tipos)) {
                               echo "<option value='$ftipo[0]'>$ftipo[1]</option>";
                    }
        ?>
     </select>
    </div>
     </td>
   </tr>
   <tr>
     <td >
    <div class="form-group">
      <label style="font-size: 14pt"><b>Elegir foto del Automovil</b></label>
      <input type="file" name="file" size="50" required />
      </div>
  </td>
    </tr>
      
    </table>
    <table>
      <fieldset>
      <legend  style="font-size: 18pt"><b></b></legend>
    <input  class="btn btn-danger" type="submit" name="submit" value="Registrar"/>
    
         
  </fieldset>

  <?php
      $msj=$_GET['msj'];
      echo $msj;
  ?>
</form>

  

</div>
<br>
    </td>
    </tr>
    </table>
    </div></center></div></center>

  
</body>
</html>
<?php
}
else
  {
echo "Debe Loguearse para utilizar esta función...";
  };
?>
