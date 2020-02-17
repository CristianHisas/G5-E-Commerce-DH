<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_producto extends Model
{
    public $table = "estado_producto";
    public $primaryKey = "id_estado_producto";
    public $timestamps = false;
    public $guarded = [];
}
