<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrito;
use App\Detalle_de_producto;
use App\Producto;
use App\Usuario;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $valor=0;
        if(preg_match("/^[1-9][0-9]*$/",trim($request->cantidad))){
            $valor=trim($request->cantidad);
        }
        $reglas=[
            "cantidad"=>"required|integer|min:1|max:$valor",
            "id_producto"=>"integer|min:1|exists:productos,id_producto",
        ];
        $this->validate($request,$reglas);

        $id=$request->id_producto;
        $usuario=Usuario::find(Auth::user()->id);
        $usuariocarrito =$usuario->getCarrito;
        $usuariocarrito =Carrito::find($usuario->id_carrito);
        //dd($usuariocarrito->getDetalle);//obtiene array donde cada  elemento de la tabla de detalle Productos(el carrito,el producto,el estado,cantidad a comprar) de un carrito en particular
        //dd($usuariocarrito->getProductos);//obtiene los productos del carrito
        $producto=Producto::find($request->id_producto);
        //creo un detalle producto
        
        if(!$usuariocarrito){
            $usuariocarrito=new Carrito;
            $usuariocarrito->id_usuario = $usuario->id;  
            $usuariocarrito->total =0;
            $usuariocarrito->save();
            //dd($usuariocarrito);
            $usuariocarrito = Carrito::all()->last();
            $usuario->id_carrito=$usuariocarrito->id_carrito;
            $usuario->save();
        }
        $carritodDetalle=$usuariocarrito->getDetalle;
        
        foreach($carritodDetalle as $key => $item){
            if($item->idproducto==$producto->id_producto){
                $detalleProductoExistente=$item;
                
            break;
            }
       
        }
        if(isset($detalleProductoExistente)){
            if($producto->cantidad>=($request->cantidad+$detalleProductoExistente->cantidad)){
                $detalleProductoExistente->cantidad=($request->cantidad+$detalleProductoExistente->cantidad);
                if($detalleProductoExistente->save()){

                    $msj[0]="success";
                    $msj[1]="Se agregada correctamente el Producto.";
                }
                $cantidadAgregar=($request->cantidad);
                
            }else{
                $msj[0]="danger";
                $msj[1]="No se agrego la cantidad al producto existente en el carrito";
                return redirect("/productoDetalle/$id")->with("msj",$msj);
            }
        }else{
            $detalleProducto=new Detalle_de_producto;
            if($producto->cantidad>=$request->cantidad){
                $detalleProducto->idcarrito=$usuariocarrito->id_carrito;
                $detalleProducto->idproducto=$request->id_producto;
                $detalleProducto->cantidad=$request->cantidad;
                
                if($detalleProducto->save()){

                    $msj[0]="success";
                    $msj[1]="Se agregada correctamente el Producto.";
                }
                $cantidadAgregar=$request->cantidad;
            }else{
                $msj[0]="danger";
                $msj[1]="No se agrego la cantidad al producto existente en el carrito";
                return redirect("/productoDetalle/$id")->with("msj",$msj);
            }

        }
        
        if($producto->descuento>0){
            $usuariocarrito->total+=($cantidadAgregar*($producto->precio*(1-($producto->descuento/100))));
        }else{
            $usuariocarrito->total+=($cantidadAgregar*$producto->precio);
        }
        
        
        $usuariocarrito->save();

        return redirect("/productoDetalle/$id")->with("msj",$msj);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrito=Carrito::find($id);
        $carritoDetalle=$carrito->getDetalle;
        foreach ($carritoDetalle as $key => $detalle) {
            $detalle->delete($detalle->id_detalle_de_producto);
        }
        $carrito->total=0;
        $carrito->save();
        return redirect("/cuenta/resumen");
    }
}
