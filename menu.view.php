<!DOCTYPE html>
<html lang="es">
	<head>
		<title>CUP</title>
        
        <meta charset="utf-8" />
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <style>
            body{
                display: flex;
                flex-direction: row;
                height: 100vh;
                margin: 0;
                padding: 0;
            }

            #menu{
                height: 100vh;
                width: 300px;
                min-width: 300px;
                max-width: 300px;
            }

        </style>
	</head>
    <body>
        <div id="menu" class="ms-1 text-center ">        
            <div class="border border-ligth h-100 rounded">
                <a class="text-white text-decoration-none " href='./index.php?c=Menu'>
                    <div class="border-bottom bg-dark fw-bold  text-white py-5 text-center">
                        Inicio
                    </div>
                </a>
                
                <div class="list-group list-group-flush">
                    <div>
                        <a class="fw-bold list-group-item list-group-item-action list-group-item-light p-3 " id="tabCliente"    href="?c=Cliente">Clientes</a>
                        <a class="fw-bold list-group-item list-group-item-action list-group-item-light p-3 " id="tabTrabajo"    href="?c=Trabajo">Trabajos</a>
                        <a class="fw-bold list-group-item list-group-item-action list-group-item-light p-3 " id="tabPeluquero"  href="?c=Peluquero">Peluqueros</a>
                    </div>
                </div>
            </div>
        </div>

<script>         
    window.onload = ()=>{
                
        let params = new URLSearchParams(document.location.search);
        let controlador = params.get("c");
        if(controlador != "Menu"){
            $(`#tab${controlador}`).addClass('bg-primary text-white');
        }
    }
</script>
