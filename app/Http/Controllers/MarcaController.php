<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;

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

        return view("/agregarMarca", compact('Marca'));
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

        $Marca->delete();

        return redirect('/abmMarca');
    }
}
