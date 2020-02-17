<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    public $table = "tarjetas";
    public $primaryKey = "id_tarjeta";
    public $timestamps = false;
    public $guarded = [];
}
