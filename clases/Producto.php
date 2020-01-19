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
      $statement = $db->prepare("INSERT INTO productos (nombre, descripcion, cantidad, img, descuento, id_marca, id_categoria) VALUES (:nombre, :descripcion, :cantidad, :img,  :descuento, :idMarca, :idCategoria)");

      $statement->bindValue(":nombre", $nombre);
      $statement->bindValue(":descripcion", $desc);
      $statement->bindValue(":cantidad", $stock);
      $statement->bindValue(":img", $img);
      $statement->bindValue(":descuento", $descuento);
      $statement->bindValue(":idMarca", $marca);
      $statement->bindValue(":idCategoria", $categoria);

      $statement->execute();
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
