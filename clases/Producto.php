<?php

/**
*
*/
class Producto
{
  private $nombre;
  private $desc;
  private $stock;
  private $marca;
  private $categoria;
  private $descuento;
  private $img;

  public function altaProducto(PDO $db, string $nombre, string $desc, int $stock, int $marca, int $categoria, float $descuento, string $img)
  {
    try
    {
    $statement = $db->prepare("INSERT into productos(id_marca,id_categoria,nombre,descripcion,cantidad,img,descuento) VALUES ( :idMarca, :idCategoria,:nombre, :descripcion, :cantidad, :img,:descuento)");

    $statement->bindValue(':idMarca', $marca,PDO::PARAM_INT);
    $statement->bindValue(":idCategoria", $categoria,PDO::PARAM_INT);
    $statement->bindValue(":nombre", $nombre,PDO::PARAM_STR);
    $statement->bindValue(":descripcion", $desc,PDO::PARAM_STR);
    $statement->bindValue(":cantidad", $stock,PDO::PARAM_INT);
    $statement->bindValue(":img", $img,PDO::PARAM_STR);
    $statement->bindValue(":descuento", $descuento,PDO::PARAM_INT);

      if ($statement->execute()) {
        echo "se creo un nuevo registro";
      }
    }
    catch (\Exception $e)
    {
      echo "Error al cargar poducto";
      $e->getMessage();
    }
  }

  public function modificarProducto()
  {

  }

  public function borrarProducto(PDO $db, $id)
  {
    try
    {

      $statement = $db->prepare("DELETE * FROM productos WHERE id_producto = :id");

      $statement->bindValue(":id", $id);

      $statement->execute();

    }
    catch (\Exception $e)
    {
        echo "Error al borrar producto";
        $e->getMessage();
    }

  }


  /**
  * Get the value of Nombre
  *
  * @return mixed
  */
  public function getNombre()
  {
    return $this->nombre;
  }

  /**
  * Get the value of Desc
  *
  * @return mixed
  */
  public function getDesc()
  {
    return $this->desc;
  }

  /**
  * Get the value of Stock
  *
  * @return mixed
  */
  public function getStock()
  {
    return $this->stock;
  }

  /**
  * Get the value of Marca
  *
  * @return mixed
  */
  public function getMarca()
  {
    return $this->marca;
  }

  /**
  * Get the value of Categoria
  *
  * @return mixed
  */
  public function getCategoria()
  {
    return $this->categoria;
  }

  /**
  * Get the value of Descuento
  *
  * @return mixed
  */
  public function getDescuento()
  {
    return $this->descuento;
  }

  /**
  * Get the value of Img
  *
  * @return mixed
  */
  public function getImg()
  {
    return $this->img;
  }

}

?>
