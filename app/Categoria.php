<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  public $table = "categorias";
  public $pk = "id_categoria";
  public $timestamps = false;
  public $guarded = [];
}
