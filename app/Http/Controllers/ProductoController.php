<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Marca;
use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Producto::orderBy("id_producto")->paginate(5);
        return view("abmProducto")->with("productos",$productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view("agregarProducto")->with("marcas",$marcas)->with("categorias",$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $id_ultimo_Marca=Marca::all("id_marca")->last()->id_marca;
        $id_ultimo_Categoria=Categoria::all("id_categoria")->last()->id_categoria;
        $reglas=[
            "nombre"=>"required|string|min:2|max:100|unique:productos",
            "descripcion"=>"nullable|string|min:2|max:1000",
            "precio"=>"required|numeric|regex:/(^0?|^[1-9]+[0-9]*)+([\.]([0-9])*)?$/",
            "stock"=>"required|integer",
            "descuento"=>"nullable|between:0,100",
            "categoria"=>"required|integer|exists:connection.categorias,id_categoria",
            "marca"=>"required|integer|exists:connection.marcas,id_marca",
            "img"=>"nullable|image|mimes:jpg,png|size:10000000",
        ];
        $msj=[];
        $this->validate($request,$reglas,$msj);
        $Producto = new Producto;
        $Producto->nombre = $request->nombre;
        $Producto->descripcion = $request->descripcion;
        $Producto->precio = $request->precio;
        $Producto->cantidad = $request->stock;
        $Producto->descuento = $request->descuento;
        $Producto->img = $request->img;
        $Producto->id_categoria = $request->categoria;
        $Producto->id_marca= $request->marca;
        $Producto->save();
        return view("agregarProducto");
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
        $producto=Producto::all()->where("id_producto","=",$id);
        return view("modificarProducto")->with("producto",$producto);
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
        //
    }
}
