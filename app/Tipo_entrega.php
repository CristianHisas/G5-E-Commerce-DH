<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_entrega extends Model
{
  public $table = "tipo_entrega";
  public $primaryKey = "id_tipo_entrega";
  public $timestamps = false;
  public $guarded = [];
}
