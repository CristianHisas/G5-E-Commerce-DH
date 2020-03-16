<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use App\Producto;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::all();
        return view('abmMarca', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formAgregarMarca');
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
          "marca" => "min:2|unique:marcas"
        ];

        $msj = [
          "min" => "El campo debe tener un minimo de :min caracteres",
          "unique" => "No se puede agregar marcas que ya estan en la base de datos"
        ];

        $this->validate($request, $reglas, $msj);

        $Marca = New Marca;
        $Marca->marca = $request->marca;
        $Marca->save();

        return view("agregarMarca", compact('Marca'));
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
        $Marca = Marca::find($id);

        return view("formModificarMarca", compact('Marca'));
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
      $reglas = [
        "marca" => "min:2|unique:marcas"
      ];

      $msj = [
        "min" => "El campo debe tener un minimo de :min caracteres",
        "unique" => "No se puede agregar marcas que ya estan en la base de datos"
      ];

      $this->validate($request, $reglas, $msj);

      $Marca = Marca::find($request->id_marca);

      $Marca->marca = $request->marca;

      $Marca->save();

      return view("modificarMarca", compact('Marca'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $Marca = Marca::find($id);
      if(isset($Marca)){
        $productos=Producto::all("id_marca")->where("id_marca","=",$id)->first();
        //dd($productos);
        if(!isset($productos)){
          $msj[1]="Marca eliminada $Marca->marca";
          $Marca->delete();
          $msj[0]="success";
        }else{
          $msj[1]="No se puede eliminar la Marca $Marca->marca";
          $msj[0]="danger";
        }
        return view('eliminarMarca')->with("msj",$msj);
      }
      return redirect("/error");
    }
}
