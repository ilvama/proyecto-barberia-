<?php

require_once "model/cliente.model.php";

// clase usuario
class Trabajo
{
	// propiedades
	private $pdo;
	public $id;
    public $idCliente;
    public $idPeluquero;
    public $titulo;
    public $descripcion;
    public $fechaTrabajo;


	// constructor
	public function __CONSTRUCT()
	{
		try
		{
			// inicializa la bbdd
			$this->pdo = Database::startDb();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	// metodo listar
	public function Listar()
	{
		try
		{

			// prepara la consulta sql
			$stm = $this->pdo->prepare("SELECT * FROM trabajos ORDER BY fechaTrabajo DESC");

			// ejectura la consulta sql
			$stm->execute();

			// retorna lo obtenido en la consulta sql
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	
	public function Filtrar($termino)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT trabajos.* FROM trabajos , clientes where trabajos.idCliente = clientes.id and (clientes.nombre LIKE '%$termino%' OR clientes.apellido LIKE '%$termino%' OR CONCAT(clientes.apellido,' ',clientes.nombre) LIKE '%$termino%') ORDER BY fechaTrabajo DESC");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
		
	// metodo obtener por id del trabajo
	public function Obtener($id)
	{
		try 
		{
			// preparo la consulta sql
			$stm = $this->pdo->prepare("SELECT * FROM trabajos WHERE id = ?");
			          
			// ejecuto la consulta sql
			$stm->execute(array($id));

			// retorno lo obtenido en la consulta sql
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}




	


	// metodo eliminar
	public function Eliminar($id)
	{
		try 
		{
			// preparo la consulta sql
			$stm = $this->pdo->prepare("DELETE FROM trabajos WHERE id = ?");			          

			// ejectuto la consulta sql
			$stm->execute(array($id));

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	// metodo actualizar
	public function Actualizar($data)
	{
		try 
		{
			// consulta sql
			$sql = "UPDATE trabajos SET 
						idCliente          = ? ,
						idPeluquero          = ?, 
						titulo          = ?, 
						descripcion          = ?, 
						fechaTrabajo         = ?
				    WHERE id = ?";

			// preparo la consulta sql y ejecuto la consulta
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->idCliente, 
                        $data->idPeluquero, 
                        $data->titulo, 
                        $data->descripcion, 
                        $data->fechaTrabajo, 
                        $data->id,
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	// metodo registrar
	public function Registrar(Trabajo $data)
	{
		try 
		{
			// consulta sql
			$sql = "INSERT INTO trabajos (idCliente,idPeluquero,titulo,descripcion,fechaTrabajo) 
					VALUES (?,?,?,?,?)";
					
			// preparo y ejecuto la consulta sql
			$this->pdo->prepare($sql)
				->execute(
					array(
                        $data->idCliente, 
                        $data->idPeluquero, 
                        $data->titulo, 
                        $data->descripcion, 
                        $data->fechaTrabajo, 
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
