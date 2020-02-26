@php
    $pagina="Home";
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
                            ¡Bienvenid@ a E-commerce!
                        </h1>
                        <p>
                            El lugar donde encontrarás todo lo que buscas y al mejor precio.
                        </p>
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
                    <img class="d-block w-100" src="img/carousel/vehiculo.jpg" alt="vehiculo">
                  </div>
                  <div class="carousel-item">
                    <a href="{{route('listaPorDescuento', ['cat' => 1])}}">
                      <img class="d-block w-100" src="img/carousel/smartphone.jpg" alt="smartphone">
                    </a>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="img/carousel/hogar.jpg" alt="hogar">
                  </div>
                  <div class="carousel-item">
                    <a href="{{route('listaPorDescuento', ['cat' => 2])}}">
                      <img class="d-block w-100" src="img/carousel/ropa.jpg" alt="ropa">
                    </a>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="img/carousel/musica.jpg" alt="musica">
                  </div>
                  <div class="carousel-item">
                    <a href="{{route('listaPorDescuento', ['cat' => 6])}}">
                      <img class="d-block w-100" src="img/carousel/computacion.jpg" alt="computacion">
                    </a>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="img/carousel/servicio.jpg" alt="servicio">
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
              </div>
        

            <div class="categorias">
                <a href="/listaProductos/9" class="irDescripcion">
                <div class="categoria">
                    <div class="icono">
                        <img src="img/categorias/autopng.png" alt="">
                    </div>
                    <div class="titulo">
                        Vehículos
                    </div>
                </div>
                </a>
                <a href="/listaProductos/1" class="irDescripcion"><!--Saque el onclick por que pertenece a javascript--->
                <div class="categoria">
                    <div class="icono">
                        <img src="img/categorias/tel.png" alt="">
                    </div>
                    <div class="titulo">
                        Smarthphones
                    </div>
                </div>
                </a>
                <a href="/listaProductos/8" class="irDescripcion">
                <div class="categoria">
                    <div class="icono">
                        <img src="img/categorias/casa.png" alt="">
                    </div>
                    <div class="titulo">
                        Hogar
                    </div>
                </div>
                </a>
                <a href="/listaProductos/2" class="irDescripcion">
                <div class="categoria">
                    <div class="icono">
                        <img src="img/categorias/ropa.png" alt="">
                    </div>
                    <div class="titulo">
                        Ropa
                    </div>
                </div>
                </a>
                <a href="/listaProductos/7" class="irDescripcion">
                <div class="categoria">
                    <div class="icono">
                        <img src="img/categorias/guitarra.png" alt="">
                    </div>
                    <div class="titulo">
                        Música
                    </div>
                </div>
                </a>
                <a href="/listaProductos/6" class="irDescripcion">
                <div class="categoria">
                    <div class="icono">
                        <img src="img/categorias/pc.png" alt="">
                    </div>
                    <div class="titulo">
                        Computación
                    </div>
                </div>
                </a>
                <a href="/listaProductos" class="irDescripcion">
                <div class="categoria">
                    <div class="icono">
                        <img src="img/categorias/servicios.png" alt="">
                    </div>
                    <div class="titulo">
                        Servicios
                    </div>
                </div>
                </a>
                <a href="/listaProductos/4" class="irDescripcion">
                <div class="categoria">
                    <div class="icono">
                        <img src="img/categorias/mas.png" alt="">
                    </div>
                    <div class="titulo">
                        Otras categorías
                    </div>
                </div>
                </a>
            </div>

        </div>
    </main>
    @endsection
