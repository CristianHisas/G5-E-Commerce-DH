<?php
class TipoUsuario{
    private $id;
    private $tipo_usuario;

    public function obtenerListaTipoUsuario(){
        $db=Conexion::conectar();
        try {
          $sql = "SELECT id_tipo_cliente as id,nombre as tipo_usuario
            FROM tipo_usuario";
          $stmt = $db->prepare($sql);
          $stmt->execute();
          //$variable = $stmt->fetchAll(PDO::FETCH_ASSOC);//array asociado
          $variable = $stmt->fetchAll(PDO::FETCH_CLASS,"TipoUsuario");//objeto
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
     * Get the value of tipo_usuario
     */ 
    public function getTipo_usuario()
    {
        return $this->tipo_usuario;
    }

    /**
     * Set the value of tipo_usuario
     *
     * @return  self
     */ 
    public function setTipo_usuario($tipo_usuario)
    {
        $this->tipo_usuario = $tipo_usuario;

        return $this;
    }
}
?>