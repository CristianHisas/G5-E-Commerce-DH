<?php
session_start();
$_SESSION["msj"]="";
?>
@extends('layouts.app')
@section('csspersonal')
  "{{ asset('/css/styles.css') }}"
@endsection
@section('content')
  <main class="container ">
    <h1>Administración</h1>

    <div class="list-group">
      <a class="list-group-item list-group-item-action" href="/cuenta/admin/abmMarca">
        Panel de administración de Marcas
      </a>
      <a class="list-group-item list-group-item-action" href="/cuenta/admin/abmCategoria">
        Panel de administración de Categorías
      </a>
      <a class="list-group-item list-group-item-action" href="/cuenta/admin/producto/lista">
        Panel de administración de Productos
      </a>
    </div>
  </main>
@endsection
