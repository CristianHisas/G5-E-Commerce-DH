@extends('layouts.login')





@section('contenido_login')

<!-----Resumen-------------------------------->
<div class="col-12 col-sm-12 col-md-9  col-lg-9 mb-4 resumen">
  <h1 class="d-block">Resumen</h1>
<!--comienzo del carrito actual--->
<h2 class="col-12 my-4" id="summary">Carrito de Compras</h2>
<div class="carrito-resumen" >

<table class="table table-bordered">
            @guest

                {{"Debe entrar en su cuenta o registrarse"}}
            @else
           
            @if (Auth::user()->id_carrito!=null)
            @php
                //$carrito=Auth::user()->getCarrito;
                $carrito=(Auth::user()->getUsuario->getCarrito);
                $carritodDetalle=$carrito->getDetalle;
                $carritoProducto=$carrito->getProductos;
            @endphp
            <thead>
            <!--Fila de detalle de cada producto-->
            <tr>
              <th>Product</th>
              <th>Description</th>
              <th>Quantity/Update</th>
              <th>Unity-price</th>
              <th>Price * Quantity</th>
              <th>Price * Discount</th>
            </tr>
          </thead>
          @foreach ($carritodDetalle as $key => $item)
          <thead>
            <!--Fila de detalle de cada producto-->
            <tr>
              <th><img src="{{$carritoProducto[$key]->img}}" alt="{{$carritoProducto[$key]->id_producto}}" sizes="" height="5%" srcset=""></th>
              <th>{{$carritoProducto[$key]->nombre}}</th>
              <th>{{$item->cantidad}}</th>
              <th>{{$carritoProducto[$key]->precio}}</th>
              <th>{{(($item->cantidad)*($carritoProducto[$key]->precio))}}</th>
              @if ($carritoProducto[$key]->descuento > 0)
                <th>{{($item->cantidad)*(($carritoProducto[$key]->precio) * (1-($carritoProducto[$key]->descuento/100)))}}</th>
              @else
                <th>{{$carritoProducto[$key]->precio}}</th>
              @endif
            </tr>
          </thead>
          @endforeach
          <tbody>
            <!--Filas y columnas-->
            <tr>
              <td colspan="5" style="text-align:right">Total Tax: </td>
              <td> Para pensar </td>
            </tr>
            <!--Fila que muestra el total del carrito-->
            <tr>
              <td colspan="5" style="text-align:right">Total Carrito Price: </td>
              <td> $ {{$carrito->total}}</td>
            </tr>
          </tbody>
        @else
          {{"Actualmente no tenes ningun producto agregado al carrito"}}
        @endif

          @endguest
        </table>
<p><a  href="/cuenta/resumen/vaciar/{{Auth::user()->id_carrito}}" class="btn btn-secondary ml-md-auto boton-efecto">Vaciar Carrito</a><button type="button" class="btn btn-secondary ml-md-auto boton-efecto">Comprar</button></p>
</div>

<!-- Fin modal -->
<!-----factura------------------------------------------------------------------------------>
<h2 class="col-12 text-left my-4">Mis Factura</h2>
  <div class="factura my-4">
    <!--Fila -->
      <div class=" col-sm-12 col-md-12 col-lg-12">
          <div class="col-sm-12 col-md-2 col-lg-2">
            <p>Comprobante</p>
          </div>
          <div class=" col-sm-12 col-md-3 col-lg-3">
            <p>Numero de Factura</p>
          </div>
          <div class=" col-sm-12 col-md-3 col-lg-3 ">
              <p>Fecha</p>
          </div>
          <div class=" col-sm-12 col-md-2 col-lg-2">
              <p>Importe</p>
          </div>
          <div class=" col-sm-12 col-md-2 col-lg-2">
              <p>Ver factura</p>
          </div>
      </div>
    <!--fin Fila -->
    <!--Fila -->
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class=" col-sm-12 col-md-2 col-lg-2">
          <p>Factura A</p>
        </div>
        <div class=" col-sm-12 col-md-3 col-lg-3">
          <p>NumeroFactura</p>
        </div>
        <div class=" col-sm-12 col-md-3 col-lg-3">
            <p>dd-mm-yyyy</p>
        </div>
        <div class=" col-sm-12 col-md-2 col-lg-2">
            <p>$15215.25</p>
        </div>
        <div class=" col-sm-12 col-md-2 col-lg-2">
            <a href="/factura/factura-ejemplo.pdf" download="factura-ejemplo.pdf" class="d-block"><p><img src="/img/pdf.png" alt=""></p></a>
        </div>
    </div>
  <!--fin Fila -->
    <!--Fila -->
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class=" col-sm-12 col-md-2 col-lg-2">
        <p>Factura A</p>
      </div>
      <div class=" col-sm-12 col-md-3 col-lg-3">
        <p>NumeroFactura</p>
      </div>
      <div class=" col-sm-12 col-md-3 col-lg-3">
          <p>dd-mm-yyyy</p>
      </div>
      <div class=" col-sm-12 col-md-2 col-lg-2">
          <p>$15215.25</p>
      </div>
      <div class=" col-sm-12 col-md-2 col-lg-2">
          <a href="descargar.html" class="d-block"><p><img src="/img/pdf.png" alt=""></p></a>
      </div>
  </div>
<!--fin Fila -->
<!--Fila -->
<div class=" col-sm-12 col-md-12 col-lg-12">
  <div class=" col-sm-12 col-md-2 col-lg-2">
    <p>Factura A</p>
  </div>
  <div class=" col-sm-12 col-md-3 col-lg-3">
    <p>NumeroFactura</p>
  </div>
  <div class=" col-sm-12 col-md-3 col-lg-3">
      <p>dd-mm-yyyy</p>
  </div>
  <div class=" col-sm-12 col-md-2 col-lg-2">
      <p>$15215.25</p>
  </div>
  <div class=" col-sm-12 col-md-2 col-lg-2">
      <a href="descargar.html" class="d-block"><p><img src="/img/pdf.png" alt=""></p></a>
  </div>
</div>
<!--fin Fila -->
  </div>
<!--fin Facturas------------------------------- -->
</div>
<!-----Fin Resumen-------------------------------->

@endsection