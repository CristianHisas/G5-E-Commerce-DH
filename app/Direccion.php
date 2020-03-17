<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
  public $table = "direcciones";
  public $primaryKey = "id_direccion";
  public $timestamps = false;
  public $guarded = [];
  public function  getFacturas(){
    return $this->hasMany("App\Factura","id_tipo_factura");
  }
}
