<?php
//require_once ('includes/pdo.php');
//require_once 'clases/Conexion.php';
//require_once "clases/Usuario.php";
//require_once "clases/Administrador.php";


//$administrador = new Administrador();

$variable=$administrador->obtenerListaAdministradores();
//var_dump($variable);
if ($_POST) {
 // var_dump($_POST);
 // exit;
if (isset($_POST["btnBorrar"])) {
    $id = $_POST["id"];

    $administrador->borrarAdministrador($id);
  }

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
@include('inc.head')
<title>ABM administradors</title>

<body>

  @include('inc.headerAdm')

  <main>

    <div class="container-fluir my-3">
      <div id="accordion">
        <div class="card">
          <div class="card-header " id="headingFour">
            <h5 class="mb-0 d-flex justify-content-between">
              <button class="btn btn-link mr-3 collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Lista de Administradores
              </button>
              <a href="agregaradministrador.php" class="btn btn-primary ml-3 ">Agregar</a>
              <a href="admin.php" class="btn btn-primary ml-3">Volver a principal</a>
            </h5>
          </div>
          <div id="collapseFour" class="collapse carrito-resumen" aria-labelledby="headingFour" data-parent="#accordion">
            <ul class="list-group">
              <li class="list-group-item">
                <div class="card-body form-inline d-flex justify-content-between px-0">
                <div class="form-group mb-1 col-1 px-1" >
                      <span  class="form-control-plaintext text-center">Id</span>
                  </div>
                  <div class="form-group mb-1 col-2 px-1" >
                      <span  class="form-control-plaintext text-center">Usuario</span>
                  </div>
                  <div class="form-group mb-1 col-2 px-1" >
                      <span  class="form-control-plaintext text-center">Nombre</span>
                  </div>
                  <div class="form-group mb-1 col-2 " >
                      <span  class="form-control-plaintext text-center">Apellido</span>
                  </div>
                  <div class="form-group mb-1 col-3 px-1" >
                      <span  class="form-control-plaintext text-center">Email</span>
                  </div>
                  <div class="form-group mb-1 col-2 px-1" >
                      <span  class="form-control-plaintext text-center">Estado</span>
                  </div>
                </div>
              </li>
              <?php foreach ($variable as $key => $value) { ?>

                <li class="list-group-item">
                  <div class="card-body  px-0">
                    <form class="form-inline" action="modificaradministrador.php" method="post" class="d-flex justify-content-between">
                      <div class="form-group mb-1 col-1 px-1" >
                        <input type="text" readonly class="form-control-plaintext text-center" id="id" value="<?=$value->getId();?>" name="id">
                      </div>
                      <div class="form-group mb-2 col-2 px-1 d-block">

                        <span  class="form-control-plaintext text-center " ><?=$value->getUsuario();?></span>
                      </div>
                      <div class="form-group mb-2 col-2 px-1">

                        <span class="form-control-plaintext text-center " >$ <?=$value->getNombre();?></span>
                      </div>
                      <div class="form-group mb-2 col-2 px-1">

                        <span class="form-control-plaintext text-center " ><?=$value->getApellido();?></span>
                      </div>
                      <div class="form-group mb-2 col-3 px-1">

                        <span class="form-control-plaintext text-center " ><?=$value->getEmail();?></span>
                      </div>
                      <div class="form-group mb-2 col-2 px-1">

                        <span class="form-control-plaintext text-center " ><?=$value->getEstado();?></span>
                      </div>
                      <div class="form-group mb-2 col-12 text-center">
                        <button type="submit" class="btn btn-primary mx-2 mb-1 " name="modificar_l" value="<?=$value->getId();?>">Modificar</button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mx-2 mb-1 " name="eliminar_l" value="<?=$value->getId();?>" data-toggle="modal" data-target="#eliminar<?=$value->getId();?>Modal">
                            Eliminar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="eliminar<?=$value->getId();?>Modal" tabindex="-1" role="dialog" aria-labelledby="eliminar<?=$value->getId();?>ModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content text-center">
                              <div class="modal-header">
                                <h5 class="modal-title" id="eliminar<?=$value->getId();?>ModalLabel">Desea eliminar este administrador?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body d-flex  justify-content-between flex-wrap">
                                <div class="form-group mb-2 col-2 px-1 d-block">

                                <span  class="form-control-plaintext text-center " ><?=$value->getUsuario();?></span>
                                </div>
                                <div class="form-group mb-2 col-2 px-1">

                                <span class="form-control-plaintext text-center " >$ <?=$value->getNombre();?></span>
                                </div>
                                <div class="form-group mb-2 col-2 px-1">

                                <span class="form-control-plaintext text-center " ><?=$value->getApellido();?></span>
                                </div>
                                <div class="form-group mb-2 col-4 px-1">

                                <span class="form-control-plaintext text-center " ><?=$value->getEmail();?></span>
                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary mx-2 mb-1 " name="btnBorrar" value="<?=$value->getId();?>">Eliminar</button>
                              </div>
                            </div>
                          </div>
                        </div>


                      </div>
                    </form>
                  </div>
                </li>

              <?php } ?>
            </ul>
          </div>
        </div>
      </div>









    </div>

  </main>


  @include('inc.footer')


</body>
</html>
