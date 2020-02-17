<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class envio extends Model
{
    public $table = "envios";
    public $primaryKey = "id_envio";
    public $timestamps = false;
    public $guarded = [];
}
