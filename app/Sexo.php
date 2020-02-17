<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    public $table = "sexos";
    public $primaryKey = "id_sexo";
    public $timestamps = false;
    public $guarded = [];
}
