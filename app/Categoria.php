<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  public $table = "categorias";
  public $pk = "id_categoria";
  public $timestamps = false;
  public $guarded = [];
  public function getProductos(){
    return $this->hasMany("App\Producto","id_categoria","id_categoria");
  }
}
