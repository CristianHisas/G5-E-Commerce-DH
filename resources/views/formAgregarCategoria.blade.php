@extends('layouts.app')
@section('csspersonal')
"{{ asset('/css/styles.css') }}"
@endsection
@section('content')
    <main class="container">
        <h1>Alta de una categoria</h1>

        <form action="agregarCategoria" method="post" enctype="multipart/form-data">
        @csrf
            <div class="bg-white border rounded p-3">
              Categoria:
            <br>
            <input type="text" name="categoria" class="form-control" value="{{old("categoria")}}" required>
           
            <div class="form-group text-center">
                  <label for="" class="text-left col-12">Imagen:</label>
                  <input type="text" name="imagenActual" value="{{old("img","/img/nod.png")}}" readonly hidden>
                  <img src="{{old("img","/img/nod.png")}}" alt="" sizes="" width="" class="" height="300px">
                  <label for="img" class="text-left col-12">Cambiar</label>
                  <input type="file" class="form-control-file" id="img" name="img" class="">
                                    <small class="text-danger">
                    @if ($errors->has("img"))
                        <ul class='text-decoration-none'>
                        @foreach ($errors->get("img") as $mensaje)
                        <li>{{$mensaje}}</li>
                        @endforeach
                        </ul>
                    @endif
                    </small>
            </div>
            <ul style= color:red>
              @foreach ($errors->all() as $error)
                <li>
                  {{$error}}
                </li>
              @endforeach
            </ul>
            </div>
            <br>
            <div class="row ">
              <input type="submit" value="Agregar Categoria" class="btn btn-secondary mr-auto  mb-2">
              <br>
              <a href="abmCategoria" class="btn btn-light mx-sm-auto ml-auto  mb-2">Volver a admin de categorias</a>              
            </div>

            <br>
        </form>

    </main>
    @endsection

