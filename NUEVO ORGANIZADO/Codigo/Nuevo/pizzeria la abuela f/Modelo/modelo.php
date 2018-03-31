<?php
class PizzeriaModel
{
	private $pdo;

	 public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=sidpla', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
		

	public function Registrar_pizzeria(Pizzeria $data)
	{
		try
		{
			$sql = "CALL Insertar_pizzeria(?, ?, ?, ?, ?, ?) "; $this->pdo->prepare($sql)->execute(
				array(
					$data->__GET('Nit_Pizzeria'),
					$data->__GET('Nom_Pizzeria'),
                    $data->__GET('Dir_Pizzeria'),
                    $data->__GET('Tel_Pizzeria'),
                    $data->__GET('Cel_Pizzeria'),
                    $data->__GET('Logo_Pizzeria')                    
					)
				);
		} catch (Exeption $e)
		{
			die($e->getMessage());
		}
	}

	 public function Listar_pizzeria()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("CALL Listar_pizzeria");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
            	$pizzeria = new Pizzeria();

            	$pizzeria->__SET('Nit_Pizzeria',       $r->Nit_Pizzeria);
            	$pizzeria->__SET('Nom_Pizzeria',       $r->Nom_Pizzeria);
                $pizzeria->__SET('Dir_Pizzeria',       $r->Dir_Pizzeria);
                $pizzeria->__SET('Tel_Pizzeria',       $r->Tel_Pizzeria);
                $pizzeria->__SET('Cel_Pizzeria',       $r->Cel_Pizzeria);
                $pizzeria->__SET('Logo_Pizzeria',      $r->Logo_Pizzeria);
                

            	$result[] = $pizzeria;
            }

            return $result;
      
        }
        catch(Exeption $e)
        {
        	die($e->getMessage());
        }
     }

    public function Actualizar_pizzeria(Pizzeria $data)
    {
        try 
        {
            $sql = "CALL Actualizar_pizzeria(?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('Nit_Pizzeria2'), 
                    $data->__GET('Nom_Pizzeria'),
                    $data->__GET('Dir_Pizzeria'), 
                    $data->__GET('Tel_Pizzeria'), 
                    $data->__GET('Cel_Pizzeria'), 
                    $data->__GET('Logo_Pizzeria'),  
                    $data->__GET('Nit_Pizzeria')
                    
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }


    public function Eliminar_pizzeria($pizzeria)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("CALL Eliminar_pizzeria(?)");                      

            $stm->execute(array($pizzeria));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }


  public function Obtener_pizzeria($pizzeria)
    {
        try 
        {
            $stm = $this->pdo->prepare("CALL Obtener_pizzeria(?)");
                      

            $stm->execute(array($pizzeria));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $pizzeria = new Pizzeria();


                $pizzeria->__SET('Nit_Pizzeria',    $r->Nit_Pizzeria);
                $pizzeria->__SET('Nom_Pizzeria',    $r->Nom_Pizzeria);
                $pizzeria->__SET('Dir_Pizzeria',    $r->Dir_Pizzeria);
                $pizzeria->__SET('Tel_Pizzeria',    $r->Tel_Pizzeria);
                $pizzeria->__SET('Cel_Pizzeria',    $r->Cel_Pizzeria);
                $pizzeria->__SET('Logo_Pizzeria',   $r->Logo_Pizzeria);
              
        return $pizzeria;
         } catch(Exeption $e){
            die($e->getMessage());
         }






}
}
?>