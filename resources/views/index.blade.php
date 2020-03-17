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
          <div class="text text-j">
            <h1>
              ¡Bienvenid@ a Order66!
            </h1>
            <p>
              El lugar donde encontrarás todo lo que buscas y al mejor precio.
            </p>
          </div>
        </div>
      </div>

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">


        <ol class="carousel-indicators">
          @foreach ($catDesc as $value)
            @if ($value->get_productos_count > 0)
              <li data-target="#carouselExampleIndicators" data-slide-to="{{$value->id_categoria}}" class="active"></li>
            @endif
          @endforeach
        </ol>

        <div class="carousel-inner">
          @foreach ($catDesc as $key => $value)
            @if ($value->get_productos_count > 0)
              @if ($key == 0)
                <div class="carousel-item active position-ab">
                  <a href="{{route('listaPorDescuento', ['cat' => $value->id_categoria])}}" class="">
                    <img class="d-block w-100 px-1 py-1" src="/img/carousel/{{$value->categoria}}.jpg" alt="{{$value->categoria}}">

                  </a>
                  <img src="/img/carousel/des.png" alt="oferta" class="fixed-top" width="20%">
                </div>
              @else
                <div class="carousel-item ">
                  <a href="{{route('listaPorDescuento', ['cat' => $value->id_categoria])}}">
                    <img class="d-block w-100 px-1 py-1" src="/img/carousel/{{$value->categoria}}.jpg" alt="{{$value->categoria}}">

                  </a>
                  <img src="/img/carousel/des.png" alt="oferta" class="fixed-top" width="20%">
                </div>
              @endif
            @endif
          @endforeach

          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>


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
  <script src="/js/navegador.js" type="text/javascript"> </script>
@endsection
