@extends('layouts.app')
@section('csspersonal')
"{{ asset('/css/styles.css') }}"
@endsection
@section('content')
    <main class="container">
        <h1>Alta de una categoria</h1>

        <form action="agregarCategoria" method="post" enctype="multipart/form-data">
        @csrf
            Categoria:
            <br>
            <input type="text" name="categoria" class="form-control" value="{{old("categoria")}}" required>
            <ul style= color:red>
              @foreach ($errors->all() as $error)
                <li>
                  {{$error}}
                </li>
              @endforeach
            </ul>
            <br>
            <div class="form-group text-center">
              <label for="" class="text-left col-12">Imagen:</label>
              <input type="text" name="imagenActual" value="{{old("img","/img/categorias/pc.png")}}" readonly hidden>
              <img src="{{old("img","/img/categorias/pc.png")}}" alt="" sizes="" width="" class="" height="300px">
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
            <br>
            <input type="submit" value="Agregar Categoria" class="btn btn-secondary">
            <a href="abmCategoria" class="btn btn-light">Volver a admin de categorias</a>

        </form>

    </main>
    @endsection

