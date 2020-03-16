<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table="productos";
    public $primaryKey="id_producto";
    public $timestamps = false;
    public $guarded = [];
    public function getMarca()
    {
        return $this->belongsTo('App\Marca', 'id_marca', 'id_marca');
    }
    public function getCategoria()
    {
        return $this->belongsTo('App\Categoria', 'id_categoria', 'id_categoria');
    }
    public function getImagenes(){
        return $this->hasMany("App\Imagen","id_producto_img");
    }
}
