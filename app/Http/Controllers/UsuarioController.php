<?php

namespace App\Http\Controllers;

use App\Carrito;
use App\Direccion;
use App\Rules\PassRule;
use App\Rules\TarjetaCvcRule;
use App\Rules\TarjetaFechaRule;
use App\Rules\TarjetaRule;
use App\Rules\TarjetaTipoRule;
use App\Sexo;
use App\Tarjeta;
use App\Tipo_tarjeta;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inacho\CreditCard;

class UsuarioController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {

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
  {
    //
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show()
  {
    $sexo=Sexo::all();
    $tipoTarjeta=Tipo_tarjeta::all();
    $id=Auth::id();
    $usuario=Usuario::find($id);
    $jsonProvincias=file_get_contents(public_path('json/doc/provincias.json'));
    $arrayProvincias=json_decode($jsonProvincias,true);
    return view("perfil")->with('arraySexo',$sexo)->with('arrayTiposDeTarjetas',$tipoTarjeta)->with('activeUser',$usuario)->with("arrayProvincias",$arrayProvincias);

  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $sexo=Sexo::all();
    $tipoTarjeta=Tipo_tarjeta::all();
    $id=Auth::id();
    $usuario=Usuario::find($id);
    $jsonProvincias=file_get_contents(public_path('json/doc/provincias.json'));
    $arrayProvincias=json_decode($jsonProvincias,true);
    return view("perfilModificar")->with('arraySexo',$sexo)->with('arrayTiposDeTarjetas',$tipoTarjeta)->with('activeUser',$usuario)->with("arrayProvincias",$arrayProvincias)->with("input","")->with("guardar",$guardar="guardar");
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
    $fechaNacimiento=preg_replace("/[\-\/.]/","-",$request->fechaNacimeiento);
    $fecha_actual = date("Y-m-d");
    $nuevafecha = strtotime ('-18 year' , strtotime($fecha_actual)); //Se resta un año menos
    $nuevafecha = date ('Y-m-d',$nuevafecha);
    $jsonProvincias=file_get_contents(public_path('json/doc/provincias.json'));
    $arrayProvincias=collect(json_decode($jsonProvincias,true));
    $arrayProvincias=$arrayProvincias->pluck("nombre");
    $fecha_actual2 = date("d-m-Y");
    $nuevaTarjeta = strtotime ('+2 month' , strtotime($fecha_actual2)); //Se resta un año menos
    $nuevaTarjeta = date ('d/m/Y',$nuevaTarjeta);
    $reglas=[
      'nombre' => ['required', 'string','min:2', 'max:255'],
      'apellido' => ['required', 'string', 'max:255'],
      "telefono"=>array('required','regex:/^[0-9][0-9]*$/',"min:8"),

      "fechaNacimiento"=>"required|date|before_or_equal:$nuevafecha",
      "direccion"=>"required|string|min:2",

      "ciudad"=>"required|string|min:2",
      "provincia"=>"required|string|min:2|in:$arrayProvincias",
      "pais"=>"required|string|min:2",
      "codigoPostal"=>"required|string|min:2",
      "sexo"=>"required|integer|exists:sexos,id_sexo",
      "nombreTitular"=>"required|string|min:2",
      "numeroTarjeta"=>array("required","numeric","min:14",new TarjetaRule()),
      "tipoDeTarjeta"=>array("required","numeric",new TarjetaTipoRule($request["numeroTarjeta"])),
      "fechaVencimiento"=>array("required","date_format:m/Y","after:$nuevaTarjeta",new TarjetaFechaRule()),
      "cvc"=>array("required","numeric","min:3",new TarjetaCvcRule($request["numeroTarjeta"],$request["tipoDeTarjeta"])),
      "adjunto"=>"nullable|image|mimes:jpeg,png,jpg|min:1|max:10000000",
    ];

    $this->validate($request,$reglas);


    $usuario=Usuario::find($id);

    if($usuario->id_direccion==null){
      $direccion=new Direccion();
    }else{
      $direccion=Direccion::find($usuario->id_direccion);
    }

    $direccion->direccion = $request->direccion;
    $direccion->provincia = $request->provincia;
    $direccion->cod_postal = $request->codigoPostal;
    $direccion->ciudad = $request->ciudad;
    $direccion->pais = $request->pais;
    $direccion->save();
    if($usuario->id_tarjeta==null){
      $tarjeta=new Tarjeta();
    }else{
      $tarjeta=Tarjeta::find($usuario->id_tarjeta);
    }
    $tarjeta->nombre_titular = $request->nombreTitular;
    $tarjeta->numeroTarjeta = $request->numeroTarjeta;
    $value=explode("/",$request->fechaVencimiento);
    $fechaentero=strtotime($value[1]."/".$value[0]."/1");
    //dd(date("Y-m-d",$fechaentero));
    $tarjeta->fecha_vencimiento =date("Y-m-d",$fechaentero);
    $tarjeta->cvc = $request->cvc;
    $tarjeta->id_tipo_tarjeta = $request->tipoDeTarjeta;
    $tarjeta->save();
    if($usuario->id_carrito==null){
      $carrito=new Carrito();

    }else{
      $carrito=Carrito::find($usuario->id_carrito);
    }
    $carrito->id_usuario = $usuario->id;
    $carrito->total =0;
    $carrito->save();

    if($usuario->id_direccion==null){
      $direccion=Direccion::all()->last();
    }else{
      $direccion=Direccion::find($usuario->id_direccion);
    }

    $usuario->id_direccion = $direccion->id_direccion;

    if($usuario->id_tarjeta==null){
      $tarjeta=Tarjeta::all()->last();
    }else{
      $tarjeta=Tarjeta::find($usuario->id_tarjeta);
    }

    $usuario->id_tarjeta = $tarjeta->id_tarjeta;

    if($usuario->id_carrito==null){
      $carrito=Carrito::all()->last();
    }else{
      $carrito=Carrito::find($usuario->id_carrito);
    }


    $usuario->id_carrito= $carrito->id_carrito;

    $usuario->id_estado =1;
    $usuario->name = $request->nombre;
    $usuario->apellido = $request->apellido;
    $usuario->telefono = $request->telefono;
    $usuario->fecha_nacimiento = $request->fechaNacimiento;
    $usuario->id_sexo = $request->sexo;
    /**
    *
    */
    $imagenNombre=$usuario->img;
    if($request->file("adjunto")){
      $file=$request->file("adjunto");
      $imagenNombre="/img/usuario/";
      $imagenNombre.=$usuario->email."/";
      $imagenNombre.=$usuario->email;
      $imagenNombre.=".";
      $imagenNombre.=$file->getClientOriginalExtension();
      $request->adjunto->move(public_path("img/usuario/$usuario->email/"),$imagenNombre);
    }else{
      if($usuario->email!=$usuario->email){
        $nuevo=str_replace($usuario->email,$usuario->email,$usuario->img);
        rename(public_path($usuario->img),public_path($nuevo));
        $imagenNombre=$nuevo;
      }else{
        $imagenNombre=$usuario->img;
      }

    }
    /**
    *
    */
    $usuario->img = $imagenNombre;
    if($usuario->save()){
      $msj[0]="success";
      $msj[1]="Perfil se agregada correctamente.";
    }
    $sexo=Sexo::all();
    $tipoTarjeta=Tipo_tarjeta::all();
    $jsonProvincias=file_get_contents(public_path('json/doc/provincias.json'));
    $arrayProvincias=json_decode($jsonProvincias,true);
    return redirect("/cuenta/perfil")->with('arraySexo',$sexo)->with('arrayTiposDeTarjetas',$tipoTarjeta)->with('activeUser',$usuario)->with("arrayProvincias",$arrayProvincias)->with("msj",$msj);

    dd($request);
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
  public function updatePassword(Request $request){

    $reglas=[
      'claveActual' => ['required', 'min:8'],
      'claveNueva' => ['required', new PassRule(), 'min:8'],
      'claveNuevaRepetir' => ['required', new PassRule(), 'min:8']
    ];
    $this->validate($request,$reglas);
    $usuario=Usuario::find(Auth::user()->id);

    if($request->claveNueva==$request->claveNuevaRepetir){
      if(Hash::check($request->claveActual,$usuario->password)){
        $usuario->password=Hash::make($request->claveNueva);
        $usuario->save();
        $msj[0]="success";
        $msj[1]="Se pudo modificar la Clave";
        return view("seguridad")->with("msj",$msj);
      }else{
        $msj[0]="danger";
        $msj[1]="No se pudo modificar la Clave";
        return view("seguridad")->with("msj",$msj);
      }
    }else{
      $msj[0]="danger";
      $msj[1]="No se pudo modificar la Clave";
    }
    return view("seguridad")->with("msj",$msj);
  }
}
