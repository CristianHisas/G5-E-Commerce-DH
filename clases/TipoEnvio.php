<?php
class TipoEnvio{
    private $id;
    private $tipo_envio;
    
    public function obtenerListaTipoEnvio(){
        $db=Conexion::conectar();
        try {
          $sql = "SELECT id_tipo_envio as id,tipo as tipo_envio
            FROM tipo_envios";
          $stmt = $db->prepare($sql);
          $stmt->execute();
          //$variable = $stmt->fetchAll(PDO::FETCH_ASSOC);//array asociado
          $variable = $stmt->fetchAll(PDO::FETCH_CLASS,"TipoEnvio");//objeto
          $stmt->closeCursor();
          return $variable;  
        } catch (\Exception $e) {
          echo "Error al obtener Lista de Sexos";
          $e->getMessage();
          return false;
        }
        
      }
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * Get the value of tipo_envio
     */ 
    public function getTipo_envio()
    {
        return $this->tipo_envio;
    }

    /**
     * Set the value of tipo_envio
     *
     * @return  self
     */ 
    public function setTipo_envio($tipo_envio)
    {
        $this->tipo_envio = $tipo_envio;

        return $this;
    }
}
?>