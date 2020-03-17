<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
  public $table = "carritos";
  public $primaryKey = "id_carrito";
  public $timestamps = false;
  public $guarded = [];
  public function getProductos(){

    return $this->belongsToMany(Producto::class,"detalle_de_productos","idcarrito","idproducto");
  }
  public function getDetalle(){
    return $this->hasMany(Detalle_de_producto::class,"idcarrito");

  }
}
