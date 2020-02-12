
<!DOCTYPE html>
<html lang="en" dir="ltr">
@include('inc.head')
<title>Productos borrar</title>
<body>

  @include('inc.headerPerfil')

  <main>
  <div class="alert alert-{{$msj[0]}} my-3">
          
      <h5>{{$msj[1]}}</h5>
    </div>
    <div class="container-fluir my-3">
          <div class=" mb-0 d-flex justify-content-between " id="headingFour">
            <a href="/cuenta/admin" class="btn btn-primary ">Volver a principal</a>
            <a href="/cuenta/admin/producto/lista" class="btn btn-primary  ">Volver atras</a>
          </div>
    </div>
  </main>
  @include('inc.footer')

</body>
</html>
