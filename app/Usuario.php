<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Direccion;
class Usuario extends Model
{
    public $table="users";
    public $guarted=[];
    public function getDireccion(){
       
        return $this->belongsTo('App\Direccion', 'id_direccion', 'id_direccion');
    }
    public function getSexo(){
       
        return $this->belongsTo('App\Sexo', 'id_sexo', 'id_sexo');
    }
    public function getTarjeta(){
       
        return $this->belongsTo('App\Tarjeta', 'id_tarjeta', 'id_tarjeta');
    }
}
