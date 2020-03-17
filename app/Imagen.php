<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
  public $table = "imagenes";
  public $primaryKey = "id_imagen";
  public $timestamps = false;
  public $guarded = [];
  public function getUsuario(){
    return $this->belongsTo("App\Producto","id_usuario_img");
  }
}
