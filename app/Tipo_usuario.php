<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_usuario extends Model
{
    public $table = "tipo_usuario";
    public $primaryKey = "id_tipo_cliente";
    public $timestamps = false;
    public $guarded = [];
}
