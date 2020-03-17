@extends('layouts.app')
@section('csspersonal')
  "{{ asset('/css/styles.css') }}"
@endsection
@section('content')
  <main class="container">
    <h1>Actualizacion de una Marca</h1>
    <?php
    $mensaje = 'No se pudo actualizar la Marca';
    $class = 'danger';
    if( $Marca->marca != NULL ){
      $mensaje = 'Marca: '.$Marca->marca;
      $mensaje .= ' se actualizo!.';
      $class = 'success';
    }
    ?>
    <div class="alert alert-<?= $class; ?>">
      <?= $mensaje; ?>
    </div>
    <a href="{{url('cuenta/admin/abmMarca')}}" class="btn btn-light">Volver a admin de marcas</a>
  </main>

@endsection
