@include('inc.head')
@include('inc.headerAdm')
<!DOCTYPE html>
<html lang="en" dir="ltr">
<title>ABM Marcas</title>

<body>
<!-- include 'includes/headerAdm.php'; -->
<main class="container">
    <h1>Administracion de Marcas</h1>

    <a href="admin" class="btn btn-outline-secondary m-3">Volver a principal</a>

        <table class="table table-stripped table-bordered table-hover bg-white">
            <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Marca</th>
                <th colspan="2">
                    <a href="formAgregarMarca" class="btn btn-dark">
                        agregar
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
<?php
            foreach ( $marcas as $marca  ){
?>
            <tr>
                <td>{{$marca->id_marca}}</td>
                <td><?= $marca['marca']; ?></td>
                <td>
                    <a href="/formModificarMarca/{{$marca->id_marca}}" class="btn btn-outline-secondary">
                        modificar
                    </a>
                </td>
                <td>
                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-outline-secondary" name="eliminar_l" value="<?=$marca["id_marca"];?>" data-toggle="modal" data-target="#eliminar<?=$marca["id_marca"];?>Modal">
                            Eliminar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="eliminar<?=$marca["id_marca"];?>Modal" tabindex="-1" role="dialog" aria-labelledby="eliminar<?=$marca["id_marca"];?>ModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content text-center">
                              <div class="modal-header">
                                <h5 class="modal-title" id="eliminar<?=$marca["id_marca"];?>ModalLabel">Desea eliminar este Marca?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body d-flex align-items-center justify-content-center flex-wrap">
                                <div class="form-group mb-2 col-10 px-1 ">
                                  <span  class="form-control-plaintext " ><?=$marca["marca"];?></span>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <a href="/abmMarca/{{$marca->id_marca}}" class="btn btn-outline-secondary">
                        eliminar
                    </a>
                              </div>
                            </div>
                          </div>
                        </div>
                </td>

            </tr>

<?php
            }
?>

            </tbody>
        </table>

    <a href="admin" class="btn btn-outline-secondary m-3">Administracion principal</a>

    </main>


  @include('inc.footer')


</body>
</html>
