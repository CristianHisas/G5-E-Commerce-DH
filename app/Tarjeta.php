<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
  public $table = "tarjetas";
  public $primaryKey = "id_tarjeta";
  public $timestamps = false;
  public $guarded = [];

  public function getTipoDeTarjeta(){
    return $this->belongsTo("App\Tipo_tarjeta","id_tipo_tarjeta");
  }
  public function  getFacturas(){
    return $this->hasMany("App\Factura","id_tarjetaf");
  }
}
