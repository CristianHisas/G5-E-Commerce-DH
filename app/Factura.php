<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
  public $table = "facturas";
  public $primaryKey = "id_factura";
  public $timestamps = false;
  public $guarded = [];

  public function getUsuario(){
    return $this->belongsTo("App\Usuario","id_usuariof");
  }
  public function getDireccion(){
    return $this->belongsTo("App\Direccion","id_direccionf");
  }
  public function getTarjeta(){
    return $this->belongsTo("App\Tarjeta","id_tarjetaf");
  }
  public function getTipoFactura(){
    return $this->belongsTo("App\Tipo_factura","id_tipo_factura");
  }
  public function getEnvio(){
    return $this->belongsTo("App\Envio","id_enviof");
  }
  /**
  * detalle de producto facutura
  */
  public function getDetalleCompra(){
    return $this->hasMany(Detalle_productos_comprado::class,"id_facturadpc");
  }
  public function getProductosCompra(){

    return $this->belongsToMany(Producto::class,"detalle_productos_comprados","id_facturadpc","id_productodpc");
  }
}
