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
    public function getCarrito()
    {
        return $this->belongsTo('App\Carrito','id_carrito', 'id_carrito' );
    }
	public function roles()
	{
    return $this
        ->belongsToMany('App\Role')
        ->withTimestamps();
	}
	
	//agregar a user model
	public function authorizeRoles($roles)
{
    if ($this->hasAnyRole($roles)) {
        return true;
    }
    abort(401, 'Esta acción no está autorizada.');
}
public function hasAnyRole($roles)
{
    if (is_array($roles)) {
        foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                return true;
            }
        }
    } else {
        if ($this->hasRole($roles)) {
            return true;
        }
    }
    return false;
}
public function hasRole($role)
{
    if ($this->roles()->where('name', $role)->first()) {
        return true;
    }
    return false;
}

}
