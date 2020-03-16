<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $categorias = Categoria::all();
        return view('abmCategoria', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formAgregarCategoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $reglas = [
        "categoria" => "min:2|unique:categorias",
        "img"=>"nullable|image|mimes:jpeg,png,jpg|min:1|max:10000000|dimensions:max_width=200,max_height=200",
      ];

      $msj = [
        "min" => "El campo debe tener un minimo de :min caracteres",
        "unique" => "No se puede agregar categorias que ya estan en la base de datos",
        "dimensions"=>"El campo :attribute tiene dimensiones de imagen inválidas tiene que ser de menos 200 de alto y ancho."
      ];

      $this->validate($request, $reglas, $msj);

      $imagenNombre="";
    if($request->file("img")){
      $file=$request->file("img");
      $imagenNombre="/img/categorias/";
      $imagenNombre.=$request->categoria;
      $imagenNombre.=".";
      $imagenNombre.=$file->getClientOriginalExtension();
      $request->img->move(public_path("img/categorias/"),$imagenNombre);
    }else{
      $imagenNombre="/img/nod.png";
    }

      $Categoria = New Categoria;
      $Categoria->categoria = $request->categoria;
      $Categoria->img = $imagenNombre;
      $Categoria->save();

      return view("/agregarCategoria", compact('Categoria'));
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
      $Categoria = Categoria::find($id);

      return view("formModificarCategoria", compact('Categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $Categoria = Categoria::find($request->id_categoria);
      $array=Categoria::all("categoria")->where("categoria","<>",$Categoria->categoria);
      $arrayNombres=[];
      foreach ($array as $key => $value) {
        $arrayNombres[]=$value->nombre;
      }
      $arrayNombres=implode(",",$arrayNombres);
      $reglas = [
        "categoria" => "notIn:$arrayNombres|required|string|min:2",
        "img"=>"nullable|image|mimes:jpeg,png,jpg|min:1|max:10000000|dimensions:max_width=200,max_height=200",
      ];

      $msj = [
        "min" => "El campo debe tener un minimo de :min caracteres",
        "unique" => "No se puede agregar categorias que ya estan en la base de datos",
        "dimensions"=>"El campo :attribute tiene dimensiones de imagen inválidas tiene que ser de menos 200 de alto y ancho."
      ];

      $this->validate($request, $reglas, $msj);

      

      $Categoria->categoria = $request->categoria;
      $imagenNombre=$Categoria->img;
    if($request->file("img")){
      $file=$request->file("img");
      $imagenNombre="/img/categorias/";
      $imagenNombre.=$request->categoria;
      $imagenNombre.=".";
      $imagenNombre.=$file->getClientOriginalExtension();
      $request->img->move(public_path("img/categorias/"),$imagenNombre);
    }else{
      if($Categoria->categoria!=$request->categoria){
        $nuevo=str_replace($Categoria->categoria,$request->categoria,$Categoria->img);
        rename(public_path($Categoria->img),public_path($nuevo));
        $imagenNombre=$nuevo;
      }else{
        $imagenNombre=$Categoria->img;
      }

    }
      $Categoria->img=$imagenNombre;
      $Categoria->save();

      return view("modificarCategoria", compact('Categoria'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $Categoria = Categoria::find($id);
      if(isset($Categoria)){
        $productos=Producto::all("id_categoria")->where("id_categoria","=",$id)->first();
        //dd($productos);
        if(!isset($productos)){
          $msj[1]="Categoria eliminada $Categoria->categoria";
          $Categoria->delete();
          $msj[0]="success";
        }else{
          $msj[1]="No se puede eliminar la Categoria $Categoria->categoria";
          $msj[0]="danger";
        }
        return view('eliminarCategoria')->with("msj",$msj);
      }
      return redirect("/error");
    }

    
}
