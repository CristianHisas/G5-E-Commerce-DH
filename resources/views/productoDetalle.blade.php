<?php
  $pagina="Descripcion de Producto";

?>
@extends('layouts.app')
@section('csspersonal')
"{{ asset('/css/styles.css') }}"
@endsection
@section('content')
<main>
  <div class="container" id="mainContainer">
     @include('inc.navBar')
    <hr>
    @if ($errors->all() && isset($errors))
    @php
        $msj[0]="danger";
        $msj[1]="No se agrego el Producto al carrito";
    @endphp
    @endif
    @isset($msj)

    @if ($msj[0]=="success")
    <p class="btn alert alert-{{$msj[0]}} col-12" role="alert">
    {{$msj[1]}}
    @endif
    @if ($msj[0]=="danger")
    <p class="btn alert alert-{{$msj[0]}} col-12" role="alert">
    {{$msj[1]}}
    @endif
    </p>
    @endisset
    <div class="row" id = "seccionProducto">
<!---------------------------------------------------------->
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" id="imagenProducto">
  <!---------------------------------------------------------->
        <div class="d-flex flex-row  justify-content-between cuadro-contenedor">
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 d-flex flex-column  align-items-stretch segundo-j">
            <ul class="col-12 d-flex flex-column justify-content-between">
              <li class="row">
              <img src="{{(isset($producto->getImagenes[0])?$producto->getImagenes[0]->imagen:'/img/nod.png')}}" class="cuadro-mini" width="100%" alt="Phone example 1">
              </li>
              <li class="row">
                <img src="{{isset($producto->getImagenes[1])?$producto->getImagenes[1]->imagen:"/img/nod.png"}}" class="cuadro-mini" width="100%" alt="Phone example 1">
              </li>
              <li class="row">
                <img src="{{(isset($producto->getImagenes[2])?$producto->getImagenes[2]->imagen:"/img/nod.png")}}" class="cuadro-mini" width="100%" alt="Phone example 1">
              </li>
            </ul>
          </div>
          <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12   primero-j img-zoom-container">
            <a href="{{url($producto->img)}}" title="Phone example" class="cuadro-max d-inline-block">
                <div class="img-zoom-lens"></div>
              <img src="{{$producto->img}}"  width="100%" alt="Phone example" class="img-telefono" id="imgPrincipal"/>
            </a>
          </div>
        </div>

<!---------------------------------------------------------->
      </div>
<!---------------------------------------------------------->
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 " id="descProducto">
              <h2><?=$producto->nombre;?></h2>
              <div id="myresult" class="img-zoom-result"></div>
              <form action="/productoDetalle" class="form-horizontal qtyFrm" method="post" enctype="multipart/form-data">
                @csrf
                <div class="control-group">
                  <label class="control-label" name= "precio" ><span>Precio: <strong>$<?=$producto->precio;?></strong></span></label>
                  <input type="hidden" name="id_producto" value="{{$producto->id_producto}}">
                  <label class="control-label" name= "precio" ><span>Stock: <strong><?=(isset($menos)?($producto->cantidad)-$menos:$producto->cantidad);?></strong></span></label>
                  <label class="control-label" name= "precio" ><span>Descuento: <strong><?=$producto->descuento;?></strong> %</span></label>
                  @if ($producto->descuento>0)
                  <label class="control-label" name= "precio" ><span>Precio Con Descuento: <strong>$<?=($producto->precio*((100-$producto->descuento)/100));?></strong></span></label>  
                  @endif
                  <div class="control-group mb-1">
                    @guest
                    <input class="cantidad px-0 col-5 mx-1" type="number" name="cantidad" value="{{old("cantidad",0)}}" min="0"
                      max="{{$producto->cantidad}}" placeholder="0" title="cantidad a comprar"/>
                      <button type="submit" class="btn btn-large btn-primary pull-right col-6"> Add to cart  <i class="fas fa-shopping-cart"></i></button>
                    @else
                    @if(Auth::user()->getUsuario->id_tipo_de_usuario==2)
                    <input class="cantidad px-0 col-5" type="number" name="cantidad" value="{{old("cantidad",0)}}" min="0"
                      max="{{(isset($menos)?($producto->cantidad)-$menos:$producto->cantidad)}}" placeholder="0" title="cantidad a comprar"/>
                      <button type="submit" class="btn btn-large btn-primary pull-right col-6"> Add to cart  <i class="fas fa-shopping-cart"></i></button>
                      @endif
                    @endguest
                  </div>
                </div>
              </form>

              @guest
              <button type="submit" class="btn btn-large btn-primary pull-right my-2"> Comprar <i class="fas fa-shopping-bag"></i></button>
              @else
              @if(Auth::user()->getUsuario->id_tipo_de_usuario==2)
              <button type="submit" class="btn btn-large btn-primary pull-right my-2"> Comprar <i class="fas fa-shopping-bag"></i></button>
              @endif
              @endguest
              <br>

              <h4>Métodos de pago</h4>
              <img src="{{asset('img/payment_methods.png')}}" alt="payment_methods.png" class="" id="payment_methods">
            </div>
        </div>

          <hr>

          <div class="row" id="seccionInfoProducto">
              <div class="col-12">
                <h4>Product Information</h4>
                <table class="table table-bordered">
                  <tbody>
                    <tr class="techSpecRow"><th colspan="2">Producto Detalle</th></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Marca: </td><td class="techSpecTD2"> {{$producto->getMarca->marca}} </td></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Categoria:</td><td class="techSpecTD2">{{$producto->getCategoria->categoria}}</td></tr>
                  </tbody>
                </table>
              </div>

              <div class="col-12">
                <h5>Descripcion</h5>
                <p><?php
                  $array=explode(PHP_EOL,$producto->descripcion);
                  foreach ($array as $key => $caracteristica) {?>
                    <ul type="circle">
                      <li >
                        <?=$caracteristica;?>
                      </li>
                    </ul>
                  <?php
                  }
                  ?></p>
              </div>
          </div>
          <hr>
        </div>
  </main>
  <!--End main-->
<script type="text/javascript" src="/js/productoDetalle.js">
</script>
  @endsection
