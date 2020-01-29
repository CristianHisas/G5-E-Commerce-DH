<?php
class Sexo{
    private $id_sexo;
    private $sexo;
    public function altaProducto(string $img)
    {
      $db=Conexion::conectar();
      $nombre = $_POST["nombre"];
      $desc = $_POST["descripcion"];
      $precio= $_POST["precio"];
      $stock = $_POST["stock"];
      $marca = $_POST["marca"];
      $categoria = $_POST["categoria"];
      $descuento = $_POST["descuento"];
      try{
      $statement = $db->prepare("INSERT into productos(id_marca,id_categoria,nombre,descripcion,precio,cantidad,img,descuento) VALUES ( :idMarca, :idCategoria,:nombre, :descripcion, :precio, :cantidad, :img,:descuento)");
  
      $statement->bindValue(':idMarca', $marca,PDO::PARAM_INT);
      $statement->bindValue(":idCategoria", $categoria,PDO::PARAM_INT);
      $statement->bindValue(":nombre", $nombre,PDO::PARAM_STR);
      $statement->bindValue(":descripcion", $desc,PDO::PARAM_STR);
      $statement->bindValue(":precio", $precio);
      $statement->bindValue(":cantidad", $stock,PDO::PARAM_INT);
      $statement->bindValue(":img", $img,PDO::PARAM_STR);
      $statement->bindValue(":descuento", $descuento);
  
      $statement->execute();
      $statement->closeCursor();
      }catch (\Exception $e)
        {
          echo "Error al cargar poducto";
          $e->getMessage();
        }
      
   
    }
  
    public function modificarProducto(int $id,string $img)
    {
      $db=Conexion::conectar();
      $nombre = $_POST["nombre"];
      $desc = $_POST["descripcion"];
      $precio= $_POST["precio"];
      $stock = $_POST["stock"];
      $marca = $_POST["marca"];
      $categoria = $_POST["categoria"];
      $descuento = $_POST["descuento"];
        $sql="UPDATE productos SET nombre=:nombre, descripcion=:descripcion, precio=:precio, cantidad=:cantidad, img=:img, descuento=:descuento, id_marca=:idMarca, id_categoria=:idCategoria WHERE id_producto =:id";
        $statement = $db->prepare($sql);
        $statement->bindValue(":nombre", $nombre,PDO::PARAM_STR);
        $statement->bindValue(":descripcion", $desc);
        $statement->bindValue(":precio", $precio);
        $statement->bindValue(":cantidad", $stock,PDO::PARAM_INT);
        $statement->bindValue(":img", $img,PDO::PARAM_STR);
        $statement->bindValue(":descuento", $descuento);
        $statement->bindValue(':idMarca', $marca,PDO::PARAM_INT);
        $statement->bindValue(":idCategoria", $categoria,PDO::PARAM_INT);
        $statement->bindValue(':id', $id,PDO::PARAM_INT);
        $statement->execute();
  
        
    }
  
    public function borrarProducto($id)
    {
      $db=Conexion::conectar();
      try
      {
  
        $statement = $db->prepare("DELETE FROM productos WHERE id_producto = :id");
  
        $statement->bindValue(":id", $id);
  
        $statement->execute();
  
      }
      catch (\Exception $e)
      {
          echo "Error al borrar producto";
          $e->getMessage();
      }
  
    }
    public function buscarPorId(int $id){
      $db=Conexion::conectar();
      if(isset($_POST["id"])){
        $id=(int)$_POST["id"];  
      }
      try {
        $sql = "SELECT id_producto as id,nombre,descripcion,precio,cantidad as stock,marca,categoria,descuento,img 
          FROM productos as p
            inner join categorias as c on p.id_categoria=c.id_categoria
            inner join marcas as m on p.id_marca=m.id_marca WHERE id_producto= :id";
        $seleccionado=$db->prepare($sql);
        $seleccionado->bindValue(":id", $id,PDO::PARAM_INT);
        $seleccionado->execute();
        $variable = $seleccionado->fetchObject("Producto");//objeto
        return $variable;
      } catch (\Exception $e) {
        $e->getMessage();
        return false;
      }
    }
    public function obtenerListaSexo(){
        $db=Conexion::conectar();
        try {
          $sql = "SELECT id_sexo,sexo 
            FROM sexos";
          $stmt = $db->prepare($sql);
          $stmt->execute();
          //$variable = $stmt->fetchAll(PDO::FETCH_ASSOC);//array asociado
          $variable = $stmt->fetchAll(PDO::FETCH_CLASS,"Sexo");//objeto
          $stmt->closeCursor();
          return $variable;  
        } catch (\Exception $e) {
          echo "Error al obtener Lista de Sexos";
          $e->getMessage();
          return false;
        }
        
      }
    /**
     * Get the value of id_sexo
     */ 
    public function getId_sexo()
    {
        return $this->id_sexo;
    }

    /**
     * Set the value of id_sexo
     *
     * @return  self
     */ 
    public function setId_sexo($id_sexo)
    {
        $this->id_sexo = $id_sexo;

        return $this;
    }

    /**
     * Get the value of sexo
     */ 
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set the value of sexo
     *
     * @return  self
     */ 
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }
}
?>