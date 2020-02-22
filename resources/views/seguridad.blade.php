@extends('layouts.login')





@section('contenido_login')

<!---Seguridad-------------------------------->
<div class="col-12 col-sm-12 col-md-9  col-lg-9 mb-4 resumen seguridad">
  <h1 class="d-block mt-2">Seguridad</h1>
<!--comienzo del Cambio de E-mail--->
<h2 class="col-12 my-4">Cambio de E-mail</h2>
<div class="informacion">
      <h5 class="">Recomendaciones de seguridad</h5>
      <p class="">Ingrese un E-mail valido.<br>
      Se le enviara un correo de confirmacion.</p>
  </div>
<form class="my-3 px-4 col-10 form-mail" name="formCambioMail" method="post" action="">
        @csrf
      <div class="form-group" >
              <label for="viejoMail">Email </label>
              <input type="email" class="form-control" id="viejoMail" name="viejoMail" aria-describedby="emailHelp" value="" readonly>
              <small class="text-muted">E-mail Actual</small>

      </div>
      <div class="form-group" >
              <label for="nuevoMail">Nuevo Email</label>
              <input type="email" class="form-control" id="nuevoMail"  name="nuevoMail" aria-describedby="emailHelp" placeholder="Ingrese Nuevo email" title="Ingresar el nuevo e-mail" required>
              <small class="text-muted">Ingrese el Nuevo E-mail</small>
              <small class="text-danger"></small>
      </div>
      <div class="form-group" >
              <label for="claveActualMail" class="">Clave Actual</label>
              <input type="password" class="form-control" id="claveActualMail" name="claveActualMail" placeholder="Clave Actual"  title="Ingresa la clave actual para cambiar el e-mail" minlength="6" maxlength="20" autocomplete="off" required>
              <small class="text-muted">Ingrese la Clave Actual para guardar los cambios</small>
              <small class="text-danger"></small>
      </div>
      <button type="submit" class="btn btn-secondary ml-md-auto boton-efecto" name="cambiosEmail" >Guardar Cambios</button>
  </form>
  <!--Fin Cambio de Email-->




  <!---Comienzo de Cambio de Clave------------------------------------------------------------------------------>
  <h2 class="col-12 text-left my-4">Cambio de Clave</h2>
  <div class="informacion">
      <h5 class="">Recomendaciones de seguridad</h5>
      <p class="">Ingresá entre 8 y 20 caracteres.<br>
      No usés la misma clave de otro sitio.</p>
  </div>
  @if ($errors->all() && isset($errors))
              @php
                  $msj[0]="danger";
                  $msj[1]="No se pudo modificar la Clave";
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
  <form class="my-3 px-4 col-10 form-clave" name="formCambioClave" method="post" action="/cuenta/seguridad/pass">
                @csrf
          <div class="form-group">
                  <label for="claveActual" class="col-form-label">Clave Actual</label>

                    <input type="password" class="form-control" id="claveActual" name="claveActual" placeholder="Clave Actual" title="Ingresa la clave actual" minlength="6" maxlength="20" autocomplete="off" required>
                    <small class="text-muted">Ingrese la Clave Actual para Cambiar la Clave</small>
                                      <small class="text-danger">
                    @if ($errors->has("claveActual"))
                        <ul class='text-decoration-none'>
                        @foreach ($errors->get("claveActual") as $mensaje)
                        <li>{{$mensaje}}</li>
                        @endforeach
                        </ul>
                    @endif
                    </small>
          </div>
          <div class="form-group ">
            <label for="claveNueva" class="">Nueva Clave</label>

              <input type="password" class="form-control" id="claveNueva" name="claveNueva" placeholder="Ingresa la Nueva Clave" title="Ingresa la Nueva clave " minlength="6" maxlength="20"  autocomplete="off" required>
              <small class="text-muted">Su contraseña debe tener entre 8 y 20 caracteres, contener letras y números, y no debe contener espacios, caracteres especiales o emoji.</small>
                                <small class="text-danger">
                    @if ($errors->has("claveNueva"))
                        <ul class='text-decoration-none'>
                        @foreach ($errors->get("claveNueva") as $mensaje)
                        <li>{{$mensaje}}</li>
                        @endforeach
                        </ul>
                    @endif
                    </small>
          </div>
          <div class="form-group ">
                  <label for="claveNuevaRepetir" class="">Repetir Nueva Clave </label>

                    <input type="password" class="form-control" id="claveNuevaRepetir" name="claveNuevaRepetir" placeholder="Repetir la Nueva Clave" title="Repita la Nueva clave" minlength="6" maxlength="20" autocomplete="off" required>
                    <small class="text-muted">Repita la Nueva Clave</small>
                                      <small class="text-danger">
                    @if ($errors->has("claveNuevaRepetir"))
                        <ul class='text-decoration-none'>
                        @foreach ($errors->get("claveNuevaRepetir") as $mensaje)
                        <li>{{$mensaje}}</li>
                        @endforeach
                        </ul>
                    @endif
                    </small>
                </div>

          <button type="submit" class="btn btn-secondary ml-md-auto boton-efecto" name="enviarClave">Guardar Cambios</button>
  </form>
 <!--fin Cambio de Clave- -->
</div>
<!---Fin Seguridad-------------------------------->

@endsection
