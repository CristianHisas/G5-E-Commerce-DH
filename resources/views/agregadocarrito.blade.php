@extends('layouts.app')





@section('content')

<!-----Resumen-------------------------------->
<div class="col-12 col-sm-12 col-md-12  col-lg-12 mb-4 resumen">
  <h1 class="d-block">Carrito</h1>
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
<!--comienzo del carrito actual--->
<h2 class="col-12 my-4" id="summary">Carrito de Compras</h2>
<div class="carrito-resumen mb-4" >

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
              <th><img src="{{$carritoProducto[$key]->img}}" alt="{{$carritoProducto[$key]->id_producto}}" sizes="" width="20%" srcset=""></th>
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
<div class="d-flex justify-content-around mb-4">
  <a href={{isset($id)?'/productoDetalle/'.$id:'/'}} class="btn btn-secondary">Volver Atras</a>
</div>
<!-- Fin modal -->
<!-----factura------------------------------------------------------------------------------>
<!--fin Facturas------------------------------- -->
</div>
<!-----Fin Resumen-------------------------------->

@endsection