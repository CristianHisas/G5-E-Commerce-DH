<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    public $table = "envios";
    public $primaryKey = "id_envio";
    public $timestamps = false;
    public $guarded = [];

    public function  getEstadoEnvio(){
        return $this->belongsTo("App\Estados_envios","id_estado_envio");
    }
    public function  getTipoEnvio(){
        return $this->belongsTo("App\Tipo_envios","id_tipo_envio");
    }
}
