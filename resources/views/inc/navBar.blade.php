<div class="row">
  <div class="col-12">
    <ul class="breadcrumb">
      <li><a href="{{url('/')}}">Home</a> <span class="divider">/</span></li>
      <li><a href="{{route('lista', ['cat' => $producto->id_categoria])}}">Productos</a> <span class="divider">/</span></li>
      <li class="active">{{$pagina}}</li>
    </ul>
  </div>
</div>
