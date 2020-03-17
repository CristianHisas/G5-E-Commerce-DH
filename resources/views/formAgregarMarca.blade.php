@extends('layouts.app')
@section('csspersonal')
  "{{ asset('/css/styles.css') }}"
@endsection
@section('content')
  <main class="container">
    <h1>Alta de una marca</h1>
    

    <form action="agregarMarca" method="post">
      @csrf
      Marca:
      <br>
      <input type="text" name="marca" class="form-control" value="{{old("marca")}}" required>
      <ul style= color:red>
        @foreach ($errors->all() as $error)
          <li>
            {{$error}}
          </li>
        @endforeach
      </ul>
      <br>
      <input type="submit" value="Agregar Marca" class="btn btn-secondary">
      <a href="abmMarca" class="btn btn-light">Volver a admin de marcas</a>
    </form>

  </main>
@endsection
