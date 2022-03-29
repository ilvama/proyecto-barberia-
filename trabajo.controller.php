
// importo el modelo
require_once 'model/trabajo.model.php';

// clase
class TrabajoController{
    
    private $model;

    // constructor
    public function __CONSTRUCT(){
        $this->model = new Trabajo();
    }
    
    // index
    public function Index(){
        require_once 'view/menu.view.php';
        require_once 'view/trabajo/trabajo.view.php';
    }

    // metodo crud
    public function Crud(){
        $alm = new Trabajo();        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        require_once 'view/menu.view.php';
        require_once 'view/trabajo/trabajo-editar.view.php';
    }
    
    // metodo detalle
    public function Detalle(){
        $alm = new Trabajo();        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        require_once 'view/menu.view.php';
        require_once 'view/trabajo/trabajo-detalle.view.php';
    }
    
    // metodo guardar
    public function Guardar(){
        $alm = new Trabajo();
        $alm->id = strtolower($_REQUEST['id']);
        $alm->idCliente = strtolower($_REQUEST['idCliente']);
        $alm->idPeluquero = strtolower($_REQUEST['idPeluquero']);
        $alm->titulo = strtolower($_REQUEST['Titulo']);
        $alm->descripcion = strtolower($_REQUEST['Descripcion']);
        $alm->fechaTrabajo = strtolower($_REQUEST['FechaTrabajo']);
        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        header('Location: index.php?c=Trabajo');
    }

    public function Filtrar(){
        $alm = new Trabajo();
        if(isset($_REQUEST['Termino'])){
            $alm->termino = strtolower($_REQUEST['Termino']);
        }
        else{
            $alm->termino = strtolower($_GET['t']);
        }
        $alm->filtrar = true;
        $this->model->Filtrar($alm->termino);
        require_once 'view/menu.view.php';
        require_once 'view/trabajo/trabajo.view.php';
    }
    
    // metodo eliminar
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php?c=Trabajo');
    }
}
