<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  public $table = "categorias";
  public $primaryKey = "id_categoria";
  public $timestamps = false;
  public $guarded = [];
}
