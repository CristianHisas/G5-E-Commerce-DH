<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    public $table = "carritos";
    public $primaryKey = "id_carrito";
    public $timestamps = false;
    public $guarded = [];
}
