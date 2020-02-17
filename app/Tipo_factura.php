<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_factura extends Model
{
    public $table = "tipo_factura";
    public $primaryKey = "id_tipo_factura";
    public $timestamps = false;
    public $guarded = [];
}
