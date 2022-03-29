<div class="w-75 text-center mt-1 ms-5 pt-2 p-3 border">

    <!-- TITULO -->
    <h1 class="page-header d-inline">Peluqueros (<span id='cantidadFilas'></span>)</h1>

    <!-- BOTON NUEVO PELUQUERO -->
    <a class="btn btn-success" href="?c=Peluquero&a=Crud" id="btnAgregar">Nuevo Peluquero</a> 
    
    <br><br><br>
    
    <!-- TABLA DE INFORMACION -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width:120px;">Apellido y Nombre</th>
                <th style="width:120px;">Sexo</th>
                <th style="width:120px;">Telefono</th>
                <th style="width:120px;">Direccion</th>
                <th style="width:60px;"></th>
                <th style="width:60px;"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($this->model->Listar() as $r): ?>
            <tr>

            <!-- APELLIDO Y NOMBRE PELUQUERO -->
                <td class="text-capitalize"><?php echo $r->apellido . " " . $r->nombre; ?></td>

                <!-- SEXO -->
                <td><?php echo $r->sexo == 'm' ? 'Masculino' : 'Femenino'; ?></td>

                <!-- TELEFONO -->
                <td><?php echo $r->telefono; ?></td>
                
                <!-- DIRECCION -->
                <td class="text-capitalize"><?php echo $r->direccion; ?></td>

                <!-- BOTON EDITAR -->
                <td> <a href="?c=Peluquero&a=Crud&id=<?php echo $r->id; ?>" id="btnEditar" class="btn btn-warning">Editar</a> </td>

                <!-- BOTON ELIMINAR -->
                <td> <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Peluquero&a=Eliminar&id=<?php echo $r->id; ?>" id="btnEliminar" class="btn btn-danger text-black">Eliminar</a> </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table> 

    <!-- CARTEL DE NO REGISTROS -->
    <div class="alert alert-warning" id="alerta">
        NO HAY NINGUN REGISTRO
    </div>
</div>

<!-- JAVASCRIPT Y JQUERY -->

<script>
    $(document).ready(()=>{
        
        let cantidadFilas = $('tr');
        let cartelAlerta = $('#alerta');
        let tabla = $('table');

        // CANTIDAD DE REGISTROS
        $('#cantidadFilas').text(cantidadFilas.length - 1);

        // OCULTANDO O MOSTRANDO TABLA Y CARTEL DE NO REGISTRO
        if(cantidadFilas.length - 1 == 0){
            tabla.addClass('d-none');
            cartelAlerta.removeClass('d-none');
        }
        else{
            tabla.removeClass('d-none');
            cartelAlerta.addClass('d-none');
        }

        // UBICANDO BOTON DE AGREGAR CLIENTE
        $('#btnAgregar').css('position','absolute').css('left','88.5%').css('top','90%').css('width','150px');
    })
</script>
