<?php
class OpinionModel
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
		

	public function Registrar_Opinion(Opinion $data)
	{
		try
		{
			$sql = "CALL Insertar_opinion(?, ?, ?, ?, ?) "; $this->pdo->prepare($sql)->execute(
				array(
					$data->__GET('Cod_Opinion'),
					$data->__GET('Opinion'),
                    $data->__GET('persona_Num_Documento_per'),
                    $data->__GET('persona_tipo_doc'),
                    $data->__GET('Fecha'),               
					)
				);
		} catch (Exeption $e)
		{
			die($e->getMessage());
		}
	}

	 public function Listar_Opinion()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("CALL Listar_Opinion");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
            	$Opinion = new Opinion();
		
            	$Opinion->__SET('Cod_Opinion',       				$r->Cod_Opinion);
            	$Opinion->__SET('Opinion',       					$r->Opinion);
                $Opinion->__SET('persona_Num_Documento_per',       	$r->persona_Num_Documento_per);
                $Opinion->__SET('persona_tipo_doc',      			$r->persona_tipo_doc);
                $Opinion->__SET('Fecha',       						$r->Fecha);
                
                

            	$result[] = $Opinion;
            }

            return $result;
      
        }
        catch(Exeption $e)
        {
        	die($e->getMessage());
        }
     }

    public function Actualizar_Opinion(Opinion $data)
    {
        try 
        {
            $sql = "CALL Actualizar_Opinion(?, ?, ?, ?, ?,?)";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('Cod_Opinion'), 
                    $data->__GET('Opinion'),
                    $data->__GET('persona_Num_Documento_per'), 
                    $data->__GET('persona_tipo_doc'), 
                    $data->__GET('Fecha'), 
                
                    $data->__GET('Cod_Opinion')
                    
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }


    public function Eliminar_Opinion($Opinion)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("CALL Eliminar_Opinion(?)");                      

            $stm->execute(array($Opinion));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }


  public function Obtener_Opinion($Opinion)
    {
        try 
        {
            $stm = $this->pdo->prepare("CALL Obtener_Opinion(?)");
                      

            $stm->execute(array($Opinion));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $Opinion = new Opinion();

				$Opinion->__SET('Cod_Opinion',       				$r->Cod_Opinion);
            	$Opinion->__SET('Opinion',       					$r->Opinion);
                $Opinion->__SET('persona_Num_Documento_per',       	$r->persona_Num_Documento_per);
                $Opinion->__SET('persona_tipo_doc',      			$r->persona_tipo_doc);
                $Opinion->__SET('Fecha',       						$r->Fecha);
              
        return $pizzeria;
         } catch(Exeption $e){
            die($e->getMessage());
         }






}
}
?>