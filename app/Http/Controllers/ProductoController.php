<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Marca;
use App\Producto;
use Directory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    // $id_ultimo_Marca=Marca::all("id_marca")->last()->id_marca;
    // $id_ultimo_Categoria=Categoria::all("id_categoria")->last()->id_categoria;
    $reglas=[
      "nombre"=>"required|string|min:2|max:100|unique:productos",
      "descripcion"=>"nullable|string|min:2|max:1000",

      "precio"=>array('required','numeric','regex:/(^0?|^[1-9]+[0-9]*)+([\.]([0-9])*)?$/','min:0.01'),
      "stock"=>"required|integer|min:0",

      "descuento"=>array('nullable','numeric','regex:/(^0?|^[1-9]{1}+[0-9]{1})+([\.]([0-9]){1,2})?$/','between:0.00,99.99'),
      "categoria"=>"required|integer|exists:categorias,id_categoria",
      "marca"=>"required|integer|exists:marcas,id_marca",
      "img"=>"nullable|image|mimes:jpeg,png,jpg|min:1|max:10000000",
    ];
    //$msj=[];
    $this->validate($request,$reglas);
    /**
    *
    */
    $imagenNombre="";
    if($request->file("img")){
      $file=$request->file("img");
      $imagenNombre="/img/productos/";
      $imagenNombre.=$request->nombre."/";
      $imagenNombre.=$request->nombre;
      $imagenNombre.=".";
      $imagenNombre.=$file->getClientOriginalExtension();
      $request->img->move(public_path("img/productos/$request->nombre/"),$imagenNombre);
    }else{
      $imagenNombre="/img/productos/phone.png";
    }

    /**
    *
    */
    $producto = new Producto;
    $producto->nombre = $request->nombre;
    $producto->descripcion = $request->descripcion;
    $producto->precio = $request->precio;
    $producto->cantidad = $request->stock;
    $producto->descuento = $request->descuento;

    $producto->img = $imagenNombre;


    $producto->id_categoria = $request->categoria;
    $producto->id_marca= $request->marca;
    if($producto->save()){
      $msj[0]="success";
      $msj[1]="Producto se agregada correctamente.";
    }
    $marcas = Marca::all();
    $categorias = Categoria::all();
    return view("agregarProducto")->with("msj",$msj)->with("marcas",$marcas)->with("categorias",$categorias);
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
      $producto=Producto::find($id);
      if($producto){
          $marcas = Marca::all();
      $categorias = Categoria::all();
      return view("modificarProducto")->with("producto",$producto)->with("marcas",$marcas)->with("categorias",$categorias);
      }

      return view("/error");



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
    $producto =Producto::find($id);

    $array=Producto::all("nombre")->where("nombre","<>",$producto->nombre);
    $arrayNombres=[];
    foreach ($array as $key => $value) {
      $arrayNombres[]=$value->nombre;
    }
    $arrayNombres=implode(",",$arrayNombres);
    $reglas=[
      "nombre"=>"notIn:$arrayNombres|required|string|min:2|max:100",
      "descripcion"=>"nullable|string|min:2|max:1000",

      "precio"=>array('required','numeric','regex:/(^0?|^[1-9]+[0-9]*)+([\.]([0-9])*)?$/','min:0.01'),
      "stock"=>"required|integer|min:0",

      "descuento"=>array('nullable','numeric','regex:/(^0?|^[1-9]{1}+[0-9]{1})+([\.]([0-9]){1,2})?$/','between:0.00,99.99'),
      "categoria"=>"required|integer|exists:categorias,id_categoria",
      "marca"=>"required|integer|exists:marcas,id_marca",
      "img"=>"nullable|image|mimes:jpeg,png,jpg|min:1|max:10000000",
    ];
    //$msj=[];
    $this->validate($request,$reglas);
    /**
    *
    */
    $producto =Producto::find($id);
    $imagenNombre=$producto->img;
    if($request->file("img")){
      $file=$request->file("img");
      $imagenNombre="/img/productos/";
      $imagenNombre.=$request->nombre."/";
      $imagenNombre.=$request->nombre;
      $imagenNombre.=".";
      $imagenNombre.=$file->getClientOriginalExtension();
      $request->img->move(public_path("img/productos/$request->nombre/"),$imagenNombre);
    }else{
      if($producto->nombre!=$request->nombre){
        $nuevo=str_replace($producto->nombre,$request->nombre,$producto->img);
        rename(public_path($producto->img),public_path($nuevo));
        $imagenNombre=$nuevo;
      }else{
        $imagenNombre=$producto->img;
      }

    }


    /**
    *
    */
    $producto =Producto::find($id);
    $producto->nombre = $request->nombre;
    $producto->descripcion = $request->descripcion;
    $producto->precio = $request->precio;
    $producto->cantidad = $request->stock;
    $producto->descuento = $request->descuento;

    $producto->img = $imagenNombre;


    $producto->id_categoria = $request->categoria;
    $producto->id_marca= $request->marca;
    $valor=$producto->update([
      "nombre"=> $request->nombre,
      "descripcion"=> $request->descripcion,
      "precio"=> $request->precio,
      "cantidad"=> $request->stock,
      "descuento"=> $request->descuento,

      "img"=> $imagenNombre,


      "id_categoria"=> $request->categoria,
      "id_marca"=> $request->marca,
    ]);
    if($valor){
      $msj[0]="success";
      $msj[1]="Producto se modifico correctamente.";
    }
    $marcas = Marca::all();
    $categorias = Categoria::all();
    return view("modificarProducto")->with("producto",$producto)->with("msj",$msj)->with("marcas",$marcas)->with("categorias",$categorias);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $producto=Producto::find($id);
    if($producto){
      //unlink(public_path($producto->img));

      if(is_dir (public_path("img/productos/".$producto->nombre))){
        unlink(public_path($producto->img));
        rmdir (public_path("img/productos/".$producto->nombre));
      }

      //Storage::deleteDirectory($directory->path);
      $producto->delete();
      $msj[0]="success";
      $msj[1]="Eliminado Producto de ID: $id";

    }else{
      $msj[0]="danger";
      $msj[1]="Error en eliminado Producto de ID: $id";
    }
    return view("borrarProducto")->with("msj",$msj);
  }
  /**
  * puca
  */
  /*   Central:
        * Lista los productos segun la categoria seleccionada.
       Lado hizquierdo:
        * Lista categorias distinto al producto actual
        * Lista  todas las marcas
        * Lista los productos segun la marca      seleccionada.

         */

        public function lista($cat,$marca=0)
        {
          if($marca>0)  {
             $productos=Producto::where("id_marca","=",$marca)->paginate(8);
          }
          elseif($marca==0) {
             $productos=Producto::where("id_categoria","=",$cat)->paginate(8);
          }
             $categorias=Categoria::withCount(['getProductos'])
             ->where("id_categoria","<>",$cat)
             ->get();
             $marcas = Marca::withCount(['getProductos'])
             ->get();
          return view("listaProductos")->with("productos",$productos)->with("categorias",$categorias)->with("marcas",$marcas);
        }

  public function listaCategorias()
  {
        $catDesc=Categoria::withCount(['getProductos'=> function($query){
                              $query
                              ->where('descuento', '>',0);}])
                              ->get();

        $categorias = Categoria::all();
        return view("index")->with("categorias",$categorias)->with("catDesc", $catDesc);
  }

  public function listaPorDescuento($cat)
  {
        $productos=Producto::where("id_categoria","=",$cat)
        ->where(function($query){
        $query->where("descuento", ">", 0);
        })
        ->paginate(8);

        $categorias=Categoria::withCount(['getProductos'=> function ($query) {
          $query->where('descuento', '>', 0);
      }])
        ->where("id_categoria","<>",$cat)
        ->get();
        $marcas = Marca::withCount(['getProductos'])
        ->get();
        return view("listaProductos")->with("productos",$productos)->with("categorias",$categorias)->with("marcas",$marcas);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */

  //public function show($id)
  public function showDetails($id)
  {
     $producto=Producto::find($id);
     if($producto){
        $marcas = Marca::find($producto->id_marca);
        $categorias = Categoria::find($producto->id_categoria);
    return view("productoDetalle")->with("producto",$producto)->with("marcas",$marcas)->with("categorias",$categorias);
    }

    return view("/error");
  }
}
