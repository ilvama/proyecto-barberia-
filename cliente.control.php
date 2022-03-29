<?php

require_once 'model/cliente.model.php';

class ClienteController{
    
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Cliente();
    }
    
    public function Index(){
        require_once 'view/menu.view.php';
        require_once 'view/cliente/clientes.view.php';
    }

    public function Crud(){
        $alm = new Cliente();        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        require_once 'view/menu.view.php';
        require_once 'view/cliente/cliente-editar.view.php';
    }
    
    public function Guardar(){
        $alm = new Cliente();
        $alm->id = $_REQUEST['id'];
        $alm->apellido = strtolower($_REQUEST['Apellido']);
        $alm->nombre = strtolower($_REQUEST['Nombre']);
        $alm->sexo = strtolower($_REQUEST['Sexo']);
        $alm->telefono = strtolower($_REQUEST['Telefono']);
        $alm->direccion = strtolower($_REQUEST['Direccion']);
      
        if ($alm->id > 0){

            $this->model->Actualizar($alm);
        } 
        else{
            $cantidadEncontrado = $this->model->ObtenerPorApellidoNombre($alm->apellido , $alm->nombre);
            if($cantidadEncontrado->cantidad == 0){
                $this->model->Registrar($alm);
                header('Location: index.php?c=Cliente');
            }
            else{
                echo("<script>let confirmacion = confirm('Ya hay un registro con ese apellido y nombre')</script>");
                header( "Refresh:1; index.php?c=Cliente", true, 303);
            }
        }
    }
   
    public function Filtrar(){
        $alm = new Cliente();
        $alm->termino = strtolower($_REQUEST['Termino']);
        $alm->filtrar = true;
        $this->model->Filtrar($alm->termino);
        require_once 'view/menu.view.php';
        require_once 'view/cliente/clientes.view.php';
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php?c=Cliente');
    }
   
}
