<?php

// clase usuario
class Peluquero
{
	// propiedades
	private $pdo;
    public $id;
    public $nombre;
    public $apellido;
    public $sexo;
    public $telefono;
    public $direccion;


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
			$stm = $this->pdo->prepare("SELECT * FROM peluqueros");

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


	// metodo obtener
	public function Obtener($id)
	{
		try 
		{
			// preparo la consulta sql
			$stm = $this->pdo->prepare("SELECT * FROM peluqueros WHERE id = ?");
			          
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
				$stm = $this->pdo->prepare("DELETE FROM peluqueros WHERE id = ?");			          
	
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
			$sql = "UPDATE peluqueros SET 
						nombre          = ? ,
						apellido          = ?, 
						sexo          = ?, 
						telefono          = ?, 
						direccion          = ? 
				    WHERE id = ?";

			// preparo la consulta sql y ejecuto la consulta
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

	// metodo registrar
	public function Registrar(Peluquero $data)
	{
		try 
		{
			// consulta sql
			$sql = "INSERT INTO peluqueros (Nombre,Apellido,Sexo,Telefono,Direccion) 
					VALUES (?,?,?,?,?)";
					
			// preparo y ejecuto la consulta sql
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
