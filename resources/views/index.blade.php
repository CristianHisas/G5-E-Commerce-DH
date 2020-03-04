@php
$pagina="Home";
@include Categoria;
@endphp



@extends('layouts.app')
@section('csspersonal')
  "{{ asset('/css/styles.css') }}"
@endsection
@section('content')

  <main>
    <div class="inner-main" id="home">
      <div class="welcome">
        <div class="inner-welcome">
          <div class="img">
            <img src="img/e-com1.png" alt="">
          </div>
          <div class="text">
            <h1>
              ¡Bienvenid@ a Order66!
            </h1>
            <p>
              El lugar donde encontrarás todo lo que buscas y al mejor precio.
            </p>
            <h3>Conoce nuestros descuentos aca!</h3>
          </div>
        </div>
      </div>


      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <a href="{{route('listaPorDescuento', ['cat' => 9])}}">
              <img class="d-block w-100" src="img/carousel/vehiculo.jpg" alt="vehiculo">
            </a>
          </div>
          <div class="carousel-item">
            <a href="{{route('listaPorDescuento', ['cat' => 1])}}">
              <img class="d-block w-100" src="img/carousel/smartphone.jpg" alt="smartphone">
            </a>
          </div>
          <div class="carousel-item">
            <a href="{{route('listaPorDescuento', ['cat' => 8])}}">
              <img class="d-block w-100" src="img/carousel/hogar.jpg" alt="hogar">
            </a>
          </div>
          <div class="carousel-item">
            <a href="{{route('listaPorDescuento', ['cat' => 2])}}">
              <img class="d-block w-100" src="img/carousel/ropa.jpg" alt="ropa">
            </a>
          </div>
          <div class="carousel-item">
            <a href="{{route('listaPorDescuento', ['cat' => 7])}}">
              <img class="d-block w-100" src="img/carousel/musica.jpg" alt="musica">
            </a>
          </div>
          <div class="carousel-item">
            <a href="{{route('listaPorDescuento', ['cat' => 6])}}">
              <img class="d-block w-100" src="img/carousel/computacion.jpg" alt="computacion">
            </a>
          </div>
          <div class="carousel-item">
            <a href="{{route('listaPorDescuento', ['cat' => 5])}}">
              <img class="d-block w-100" src="img/carousel/servicio.jpg" alt="servicio">
            </a>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      <div class="categorias">

         <?php
            foreach ($categorias as $key => $value) {
         ?>
            <a href="/listaProductos/{{$value->id_categoria}}" class="irDescripcion">
              <div class="categoria">
                <div class="icono">
                    <img src="<?=$value->img;?>" alt="" sizes="" width="50%" class="zoom">
                </div>
                <div class="titulo">
                   <?=$value->categoria;?>
                </div>
              </div>
            </a>
         <?php
         }
         ?>

      </div>

    </div>
  </main>
@endsection
