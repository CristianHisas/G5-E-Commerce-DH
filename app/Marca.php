<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public $table = "marcas";
    public $pk = "id_marca";
    public $timestamps = false;
    public $guarded = [];
}
