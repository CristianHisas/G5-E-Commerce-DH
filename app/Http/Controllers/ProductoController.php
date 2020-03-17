<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Detalle_de_producto;
use App\Detalle_productos_comprado;
use App\Imagen;
use App\Marca;
use App\Producto;
use Directory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    $reglas=[
      "nombre"=>"required|string|min:2|max:100|unique:productos",
      "descripcion"=>"nullable|string|min:2|max:1000",

      "precio"=>array('required','numeric','regex:/(^0?|^[1-9]+[0-9]*)+([\.]([0-9])*)?$/','min:0.01'),
      "stock"=>"required|integer|min:0",

      "descuento"=>array('nullable','numeric','regex:/(^[0-9]?|^[1-9]{1}+[0-9]{1})+([\.]([0-9]){1,2})?$/','between:0.00,99.99'),
      "categoria"=>"required|integer|exists:categorias,id_categoria",
      "marca"=>"required|integer|exists:marcas,id_marca",
      "img"=>"nullable|image|mimes:jpeg,png,jpg|min:1|max:10000000|dimensions:max_width=1000,max_height=1000",
      "num1"=>"nullable|image|mimes:jpeg,png,jpg|min:1|max:10000000|dimensions:max_width=1000,max_height=1000",
      "num2"=>"nullable|image|mimes:jpeg,png,jpg|min:1|max:10000000|dimensions:max_width=1000,max_height=1000",
      "num3"=>"nullable|image|mimes:jpeg,png,jpg|min:1|max:10000000|dimensions:max_width=1000,max_height=1000",
    ];

    $this->validate($request,$reglas);
    /**
    *
    */
    //Almacena la imagen del producto con su respectivo nombre
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
      $imagenNombre="/img/nod.png";
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
    /**
    * otras
    */
    $imagen1="";
    $imageno1=new Imagen;
    if($request->file("num1")){
      $file=$request->file("num1");
      $imagen1="/img/productos/";
      $imagen1.=$request->nombre."/";
      $imagen1.=$request->nombre."-1";
      $imagen1.=".";
      $imagen1.=$file->getClientOriginalExtension();
      $request->num1->move(public_path("/img/productos/$request->nombre/"),$imagen1);
    }else{
      $imagen1="/img/nod.png";
    }
    $imageno1->imagen=$imagen1;
    $imageno1->id_producto_img=Producto::all('id_producto')->last()->id_producto;
    $imageno1->save();
    $imagen2="";
    $imageno2=new Imagen;
    if($request->file("num2")){
      $file=$request->file("num2");
      $imagen2="/img/productos/";
      $imagen2.=$request->nombre."/";
      $imagen2.=$request->nombre."-2";
      $imagen2.=".";
      $imagen2.=$file->getClientOriginalExtension();
      $request->num2->move(public_path("/img/productos/$request->nombre/"),$imagen2);
    }else{
      $imagen2="/img/nod.png";
    }
    $imageno2->imagen=$imagen2;
    $imageno2->id_producto_img=Producto::all('id_producto')->last()->id_producto;
    $imageno2->save();
    $imagen3="";
    $imageno3=new Imagen;
    if($request->file("num3")){
      $file=$request->file("num3");
      $imagen3="/img/productos/";
      $imagen3.=$request->nombre."/";
      $imagen3.=$request->nombre."-3";
      $imagen3.=".";
      $imagen3.=$file->getClientOriginalExtension();
      $request->num3->move(public_path("/img/productos/$request->nombre/"),$imagen3);
    }else{
      $imagen3="/img/nod.png";
    }
    $imageno3->imagen=$imagen3;
    $imageno3->id_producto_img=Producto::all('id_producto')->last()->id_producto;
    $imageno3->save();
    /**
    *
    */
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
  //Buscador de producto
  public function buscar(Request $request)
  {
    $buscar=trim($request->buscar);
    if(isset($buscar)){
      define("Buscar",$buscar);

      $cat=Categoria::withCount(['getProductos'])
      ->where('categoria', 'like', '%'.Buscar.'%')
      ->get();

      $mar = Marca::withCount(['getProductos'])
      ->where('marca', 'like', '%'.Buscar.'%')
      ->get();

      $productos=Producto::
      orWhere('nombre', 'like', '%'.$buscar.'%')
      ->orWhere(function ($query) {
        return $query->WhereHas('getMarca',function ($query) {
          $query->where('marca', 'like', '%'.Buscar.'%');
        });
      })
      ->orWhere(function ($query) {
        return $query->WhereHas('getCategoria',function ($query) {
          $query->where('categoria', 'like', '%'.Buscar.'%');
        });
      })
      ->paginate(8);
    }else{
      $cat=Categoria::withCount(['getProductos'])->get();
      $mar=Marca::withCount(['getProductos'])->get();
      $productos=Producto::all()->paginate(8);
    }

    $productos=$this->verificarProductos($productos);
    return view('listaProductos')->with('marcas',$mar)->with('categorias',$cat)->with('productos',$productos);
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

      "descuento"=>array('nullable','numeric','regex:/(^[0-9]?|^[1-9]{1}+[0-9]{1})+([\.]([0-9]){1,2})?$/','between:0.00,99.99'),
      "categoria"=>"required|integer|exists:categorias,id_categoria",
      "marca"=>"required|integer|exists:marcas,id_marca",
      "img"=>"nullable|image|mimes:jpeg,png,jpg|min:1|max:10000000|dimensions:max_width=1000,max_height=1000",
      "num1"=>"nullable|image|mimes:jpeg,png,jpg|min:1|max:10000000|dimensions:max_width=1000,max_height=1000",
      "num2"=>"nullable|image|mimes:jpeg,png,jpg|min:1|max:10000000|dimensions:max_width=1000,max_height=1000",
      "num3"=>"nullable|image|mimes:jpeg,png,jpg|min:1|max:10000000|dimensions:max_width=1000,max_height=1000 ",
    ];
    $msje=["dimensions"=>"El campo :attribute tiene dimensiones de imagen inválidas tiene que ser de menos 1000 de alto y ancho."];
    $this->validate($request,$reglas,$msje);
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
    * otras
    */
    $imagenes=$producto->getImagenes;
    if(isset($imagenes[0])){
      $imageno1=$imagenes[0];
      $imagen1=$imagenes[0]->imagen;

    }else{
      $imagen1="/img/nod.png";
      $imageno1=new Imagen;
    }
    if($request->file("num1")){
      if(isset($imagenes[0]) && is_file(public_path($imagenes[0]->imagen))){
        unlink(public_path($imagenes[0]->imagen));
      }


      $file=$request->file("num1");
      $imagen1="/img/productos/";
      $imagen1.=$request->nombre."/";
      $imagen1.=$request->nombre."-1";
      $imagen1.=".";
      $imagen1.=$file->getClientOriginalExtension();
      $request->num1->move(public_path("img/productos/$request->nombre/"),$imagen1);
    }
    $imageno1->imagen=$imagen1;
    $imageno1->id_producto_img=$producto->id_producto;
    $imageno1->save();
    if(isset($imagenes[1])){
      $imageno2=$imagenes[1];
      $imagen2=$imagenes[1]->imagen;
    }else{
      $imagen2="/img/nod.png";
      $imageno2=new Imagen;
    }
    if($request->file("num2")){
      if( isset($imagenes[1]) && is_file(public_path($imagenes[1]->imagen))){
        unlink(public_path($imagenes[1]->imagen));
      }
      $file=$request->file("num2");
      $imagen2="/img/productos/";
      $imagen2.=$request->nombre."/";
      $imagen2.=$request->nombre."-2";
      $imagen2.=".";
      $imagen2.=$file->getClientOriginalExtension();
      $request->num2->move(public_path("img/productos/$request->nombre/"),$imagen2);
    }
    $imageno2->imagen=$imagen2;
    $imageno2->id_producto_img=$producto->id_producto;
    $imageno2->save();
    if(isset($imagenes[2])){
      $imageno3=$imagenes[2];
      $imagen3=$imagenes[2]->imagen;
    }else{
      $imagen3="/img/nod.png";
      $imageno3=new Imagen;
    }
    if($request->file("num3")){
      if(isset($imagenes[2]) && is_file(public_path($imagenes[2]->imagen)) ){
        unlink(public_path($imagenes[2]->imagen));
      }
      $file=$request->file("num3");
      $imagen3="/img/productos/";
      $imagen3.=$request->nombre."/";
      $imagen3.=$request->nombre."-3";
      $imagen3.=".";
      $imagen3.=$file->getClientOriginalExtension();
      $request->num3->move(public_path("img/productos/$request->nombre/"),$imagen3);
    }
    $imageno3->imagen=$imagen3;
    $imageno3->id_producto_img=$producto->id_producto;
    $imageno3->save();
    /**
    *
    */

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
    if(isset($producto)){

      //Storage::deleteDirectory($directory->path);
      $productoR1=Detalle_de_producto::all("idproducto")->where("idproducto","=",$id)->first();
      $productoR2=(Detalle_productos_comprado::all("id_productodpc")->where("id_productodpc","=",$id)->first());
      if( !isset($productoR1) && !isset($productoR2) ){
        //unlink(public_path($producto->img));

        if(is_dir (public_path("img/productos/".$producto->nombre))){
          $archivo=glob(public_path("img/productos/".$producto->nombre."/*"));

          foreach ($archivo as $key => $value) {
            unlink($value);
          }
          // dd(scandir(public_path("img/productos/".$producto->nombre)));

          // unlink(public_path($producto->img));
          rmdir (public_path("img/productos/".$producto->nombre));
        }
        $imagenes=$producto->getImagenes;
        foreach ($imagenes as $key => $value) {
          $value->delete();
        }
        $producto->delete();
        $msj[0]="success";
        $msj[1]="Eliminado Producto de ID: $id";
        return view("borrarProducto")->with("msj",$msj);

      }else{
        $msj[0]="danger";
        $msj[1]="Error en eliminado Producto de ID: $id";
      }


    }
    return redirect("/error");

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
    $productos=$this->verificarProductos($productos);
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
    {       define('cat',$cat);
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
      $marcas = Marca::withCount(['getProductos'=>function ($query) {
        $query->where('descuento', '>', 0)->where("id_categoria","=",cat);}])
        ->get();
        $productos=$this->verificarProductos($productos);
        return view("listaProductos")->with("productos",$productos)->with("categorias",$categorias)->with("marcas",$marcas);
      }
      /**
      * Verifica el stock de la lista de productos a mostrar segun usuario
      * @return productos
      */
      private function verificarProductos($productos){
        $usuario=Auth::user();
        if(isset($usuario)){
          $carritoId=Auth::user()->getUsuario->getCarrito;
          if(isset($carritoId)){
            $carritoId=$carritoId->id_carrito;

            foreach ($productos as $key => $value) {

              $productoAgregado=Detalle_de_producto::where('idcarrito','=',$carritoId)->where('idproducto','=',$value->id_producto)->first();
              if(isset($productoAgregado)){
                $value->cantidad-=$productoAgregado->cantidad;

                $productos[$key]=$value;
              }
            }

          }

        }
        return $productos;
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
        if(isset($producto)){
          $marcas = Marca::find($producto->id_marca);
          $categorias = Categoria::find($producto->id_categoria);
          $usuario=Auth::user();
          if(isset($usuario)){
            $carritoId=Auth::user()->getUsuario->getCarrito;
            if(isset($carritoId)){
              $carritoId=$carritoId->id_carrito;
              $productoAgregado=Detalle_de_producto::where('idcarrito','=',$carritoId)->where('idproducto','=',$id)->first();
              if(isset($productoAgregado)){
                return view("productoDetalle")->with("producto",$producto)->with("marcas",$marcas)->with("categorias",$categorias)->with("menos",$productoAgregado->cantidad);
              }else{
                return view("productoDetalle")->with("producto",$producto)->with("marcas",$marcas)->with("categorias",$categorias);
              }
            }
          }

          return view("productoDetalle")->with("producto",$producto)->with("marcas",$marcas)->with("categorias",$categorias);
        }

        return view("/error");
      }
    }
