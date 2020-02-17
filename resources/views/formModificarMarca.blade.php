@extends('layouts.app')
@section('csspersonal')
"{{ asset('/css/styles.css') }}"
@endsection
@section('content')
    <main class="container">
        <h1> Actualizacion de una marca</h1>

        <form action="/modificarMarca" method="post">
        @csrf
            Marca:
            <input type="hidden" name="id_marca" value= {{$Marca->id_marca}}>
            <br>
            <input type="text" name="marca" value={{$Marca->marca}} class="form-control" required>
            <ul style= color:red>
              @foreach ($errors->all() as $error)
                <li>
                  {{$error}}
                </li>
              @endforeach
            </ul>
            <br>
            <input type="submit" value="Modificar Marca" class="btn btn-secondary">
            <a href="/abmMarca" class="btn btn-light">Volver a admin de marcas</a>

        </form>

    </main>

@include('inc.footer')
