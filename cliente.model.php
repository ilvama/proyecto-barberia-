<?php
class Cliente
{
	private $pdo;
    public $id;
    public $nombre;
    public $apellido;
    public $sexo;
    public $telefono;
    public $direccion;


	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::startDb();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{

			$stm = $this->pdo->prepare("SELECT * FROM clientes   ORDER BY apellido ASC");
			$stm->execute();
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
			$stm = $this->pdo->prepare("SELECT clientes.* FROM clientes where (nombre Like '%$termino%' or apellido LIKE '%$termino%' OR CONCAT(clientes.apellido,' ',clientes.nombre) LIKE '%$termino%')   ORDER BY apellido ASC");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM clientes WHERE id = ? ");			          
			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ObtenerPorApellidoNombre($apellido ,$nombre)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT COUNT(*) as 'cantidad' FROM clientes WHERE apellido = ? and nombre = ? ");			          
			$stm->execute(array($apellido , $nombre));
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
			$stm = $this->pdo->prepare("DELETE FROM clientes WHERE id = ?");			          

			// ejectuto la consulta sql
			$stm->execute(array($id));

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE clientes SET 
						nombre          = ? ,
						apellido          = ?, 
						sexo          = ?, 
						telefono          = ?, 
						direccion          = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->apellido, 
                        $data->sexo, 
                        $data->telefono, 
                        $data->direccion, 
                        $data->id,
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Cliente $data)
	{
		try 
		{
			$sql = "INSERT INTO clientes (nombre,apellido,sexo,telefono,direccion) 
					VALUES (?,?,?,?,?)";
			
			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->nombre,
					$data->apellido,
					$data->sexo,
					$data->telefono,
					$data->direccion
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}