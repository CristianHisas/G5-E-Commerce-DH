<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <title>Factura</title>
</head>
<body>
  <main class="container-fuir px-2 py-2">
    <div class="d-flex flex-column border border-dark ">
      <div class="col-12">
        <h1 class="col-12  text-center my-0 mx-0 px-0 py-1">ORIGINAL</h1>
        <div class="row  border-top border-dark">
          <div class="col-6 d-flex flex-column  justify-content-end  flex-wrap border-right border-dark ">


            <div class="d-flex flex-row flex-wrap px-1 py-2">
              <small  class="col-3 pr-0">Razon Social: </small>
              <small class="col-9 pl-0">Consumido Final</small>
              <small  class="col-4 pr-0">Domicilio Comercial: </small>
              <small class="col-8 pl-0">Aqui</small>
              <small class="col-12">Condicion Frente al IVA: Responsable Monotributista</small>
            </div>


          </div>
          <div class="col-6 d-flex flex-column flex-wrap">
            <div class="d-flex flex-row px-1 py-2">
              <h4 class="col-12">FACTURA</h4>
            </div>
            <div class="d-flex flex-row flex-wrap mb-3">
              <small class="col-6">Punto de Venta: 000001</small><small class="col-6">Comp.Nro: 000001</small>
              <small class="col-3 pr-0">Fecha de Emision: </small><small class="col-8">dd-mm-yyyy</small>
            </div>
            <div class="d-flex flex-row flex-wrap px-1 py-2">
              <small class="col-1 pr-0">CUIT:</small><small class="col-11">NNNNNNNNNNNNNNNNN</small>
              <small class="col-3 pr-0">Ingresos Brutos:</small><small class="col-9 pl-1">nnnnnnnnnnnn</small>
              <small class="col-5 pr-0">Fecha de Inicio de Actividades: </small><small class="col-7">dd-mm-yyyy</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="row border-top border-dark">
          <div class="col-6 d-flex flex-column    flex-wrap">
            <div class="d-flex flex-row flex-wrap px-1 py-2">
              <small  class="col-1 pr-0">CUIT:</small><small class="col-10">nnnnnnnnnnnnnn</small>
              <small  class="col-12 ">Condicion Frente al IVA: Consumidor Final</small>
              <small class="col-3 pr-0">Condicion Venta: </small><small class="col-9">Tarjeta</small>
            </div>
          </div>
          <div class="col-6 d-flex flex-column    flex-wrap">
            <div class="d-flex flex-row flex-wrap px-1 py-2">
              <small class="col-4 pl-0">Nombre y Apellido/Razon Social: </small><small class="col-8 pl-0">dhsdhsjdhjsdjdsj</small>
              <small class="col-2 pl-0">Domicilio: </small><small class="col-10 pl-0">dfdgfgdfgdfg</small>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="row border-top border-dark">
          <table class="table table-bordered">
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
                  <th class="text-center"><img src="{{$carritoProducto[$key]->img}}" alt="{{$carritoProducto[$key]->id_producto}}" sizes="" height="5%" srcset=""></th>
                  <th class="text-center">{{$carritoProducto[$key]->nombre}}</th>
                  <th class="text-center">{{$item->cantidad}}</th>
                  <th class="text-center">{{$carritoProducto[$key]->precio}}</th>
                  <th class="text-center">{{(($item->cantidad)*($carritoProducto[$key]->precio))}}</th>
                  @if ($carritoProducto[$key]->descuento > 0)
                    <th class="text-center">{{($item->cantidad)*(($carritoProducto[$key]->precio) * (1-($carritoProducto[$key]->descuento/100)))}}</th>
                  @else
                    <th class="text-center">{{$carritoProducto[$key]->precio}}</th>
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
          </table>
        </div>
      </div>

    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
