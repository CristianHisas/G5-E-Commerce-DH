<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_productos_comprado extends Model
{
  public $table = "detalle_productos_comprados";
  public $primaryKey = "id_detalle_de_producto";
  public $timestamps = false;
  public $guarded = [];
  public function getCarritos(){

    return $this->belongsTo("App/Factura","id_factura");
  }
}
