<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    public $table = "direcciones";
    public $primaryKey = "id_direccion";
    public $timestamps = false;
    public $guarded = [];
}