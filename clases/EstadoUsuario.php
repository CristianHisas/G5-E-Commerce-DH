<?php
class EstadoUsuario{
    private $id;
    private $estado;
    public function obtenerListaEstadoUsuario(){
        $db=Conexion::conectar();
        try {
          $sql = "SELECT id_estado as id,estado as estado
            FROM estados";
          $stmt = $db->prepare($sql);
          $stmt->execute();
          //$variable = $stmt->fetchAll(PDO::FETCH_ASSOC);//array asociado
          $variable = $stmt->fetchAll(PDO::FETCH_CLASS,"EstadoUsuario");//objeto
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
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}
?>