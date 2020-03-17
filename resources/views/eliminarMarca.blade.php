@extends('layouts.app')
@section('csspersonal')
  "{{ asset('/css/styles.css') }}"
@endsection
@section('content')
  <main>
    <div class="alert alert-{{$msj[0]}} my-3">

      <h5>{{$msj[1]}}</h5>
    </div>
    <div class="container-fluir my-3">
      <div class=" mb-0 d-flex justify-content-between " id="headingFour">
        <a href="/cuenta/admin/" class="btn btn-primary ">Volver a principal</a>
        <a href="/cuenta/admin/abmMarca" class="btn btn-primary  ">Volver atras</a>
      </div>
    </div>
  </main>
@endsection
