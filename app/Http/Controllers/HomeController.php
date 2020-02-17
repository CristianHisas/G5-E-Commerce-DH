<?php

namespace App\Http\Controllers;

use App\Producto;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {        
         $productos=Producto::all();
/*        No deviera traer todos sino segun categoria seleccionada
          $producto =Producto::find($id_categoria);
          $productos=Producto::all()->where("categoria","<>",$producto->categoria);*/
        return view("listaProductos")->with("productos",$productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //public function show($id)
    public function showDetails()
    {   
        $productos=Producto::all();               
        return view("productoDetalle")->with("productos",$productos);         
    }
    
}
