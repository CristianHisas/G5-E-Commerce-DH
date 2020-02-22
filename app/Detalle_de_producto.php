<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_de_producto extends Model
{
    public $table = "detalle_de_productos";
    public $primaryKey = "id_detalle_de_Producto";
    public $timestamps = false;
    public $guarded = [];
    public function getCarritos(){
       
        return $this->belongsTo("App/Carrito","id_carrito");
    }
}
