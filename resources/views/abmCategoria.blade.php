@include('inc.head')
@include('inc.headerAdm')

<!DOCTYPE html>
<html lang="en" dir="ltr">
<title>ABM Categorias</title>
<body>
<!-- include 'includes/headerAdm.php'; -->
<main class="container">
    <h1>Administracion de Categorias</h1>
    <a href="{{url('cuenta/admin')}}" class="btn btn-outline-secondary m-3">Administracion principal</a>

        <table class="table table-stripped table-bordered table-hover bg-white">
            <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Categoria</th>
                <th colspan="2">
                    <a href="formAgregarCategoria" class="btn btn-dark">
                        agregar
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
<?php
            foreach ( $categorias as $categoria  ){
?>
            <tr>
                <td>{{$categoria->id_categoria}}</td>
                <td><?= $categoria['categoria']; ?></td>
                <td>
                    <a href="formModificarCategoria/{{$categoria->id_categoria}}" class="btn btn-outline-secondary">
                        modificar
                    </a>
                </td>
                <td>
<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-secondary" name="eliminar_l" value="<?=$categoria["id_categoria"];?>" data-toggle="modal" data-target="#eliminar<?=$categoria["id_categoria"];?>Modal">
                            Eliminar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="eliminar<?=$categoria["id_categoria"];?>Modal" tabindex="-1" role="dialog" aria-labelledby="eliminar<?=$categoria["id_categoria"];?>ModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content text-center">
                              <div class="modal-header">
                                <h5 class="modal-title" id="eliminar<?=$categoria["id_categoria"];?>ModalLabel">Desea eliminar este Categoria?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body d-flex align-items-center justify-content-center flex-wrap">
                                <div class="form-group mb-2 col-10 px-1 ">
                                  <span  class="form-control-plaintext " ><?=$categoria["categoria"];?></span>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <a href="abmCategoria/{{$categoria->id_categoria}}" class="btn btn-outline-secondary">
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

        <a href="{{url('cuenta/admin')}}" class="btn btn-outline-secondary m-3">Administracion principal</a>
    </main>


  @include('inc.footer')


</body>
</html>
