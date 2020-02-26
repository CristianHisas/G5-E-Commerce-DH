<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_envios extends Model
{
    public $table = "tipo_envios";
    public $primaryKey = "id_tipo_envio";
    public $timestamps = false;
    public $guarded = [];
    public function  getEnvio(){
        return $this->hasMany("App\Envio","id_tipo_envio");
    }
}
