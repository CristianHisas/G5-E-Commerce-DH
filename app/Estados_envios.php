<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estados_envios extends Model
{
  public $table = "estados_envios";
  public $primaryKey = "id_estado_de_envio";
  public $timestamps = false;
  public $guarded = [];

  public function getEnvios(){
    return $this->hasMany("App\Envio","id_estado_de_envio");
  }
}
