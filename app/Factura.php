<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    public $table = "facturas";
    public $primaryKey = "id_factura";
    public $timestamps = false;
    public $guarded = [];
}
