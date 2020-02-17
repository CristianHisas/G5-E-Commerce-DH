<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_tarjeta extends Model
{
    public $table = "tipo_tarjeta";
    public $primaryKey = "id_tipo_tarjeta";
    public $timestamps = false;
    public $guarded = [];
}
