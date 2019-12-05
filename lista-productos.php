<?php
  session_start();
  include_once("includes/funciones.php");
  include_once("includes/baseDeDatos.php");
  $pagina="Lista de Productos";
  //$pagina_anterior=$_SERVER['HTTP_REFERER'];//pagina anterior
  if(isset($_SESSION["activeUser"]) && !is_null($_SESSION["activeUser"])){
    if($_SESSION["activeUser"]["fotoPerfil"]==""){
      $_SESSION["activeUser"]["fotoPerfil"]=(isset($imagenUsuario))?$imagenUsuario:"img/perfil.png";
    }  
    $activeUser=$_SESSION["activeUser"];
  }
  $pagina="Datos de Usuario";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="shortcut icon" href="favicon.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto:400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/lista-productos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/mainListaProductos.css">

</head>
<body class="main-perfil">
        <!--Comienza el header-->
    <header class="container-fluir fixed-top">
    <?php
      include_once("includes/headerPerfil.php");
    ?>
    </header>
     <!--Fin el header-->
    <main class="container mb-4">
        <div class="inner-main" id="lista-productos">
            <aside>
                <div class="tags">
                    <span class="tag">
                        <span>Nuevo ✖ </span>
                        <!-- <i  class="material-icons">&#xe14c;</i> -->
                    </span>
                    <span class="tag">
                        <span>Motorola ✖</span>
                        <!-- <i class="material-icons">&#xe14c;</i> -->
                    </span>
                </div>
                <dl>
                    <dt>
                        Linea
                    </dt>
                    <dd>
                        <a href="#">
                            <span class="filter-name">Moto</span>
                            <span class="filter-result-qty">(123)</span>
                        </a>
                    </dd>
                    <dd>
                        <a href="#">
                            <span class="filter-name">RAZR</span>
                            <span class="filter-result-qty">(65)</span>
                        </a>
                    </dd>
                    <dd>
                        <a href="#">
                            <span class="filter-name">One</span>
                            <span class="filter-result-qty">(70)</span>
                        </a>
                    </dd>
                    <dd>
                        <a href="#">
                            Ver todos
                        </a>
                    </dd>
                </dl>
                <dl>
                    <dt>
                        Modelo
                    </dt>
                    <dd>
                        <a href="#">
                            <span class="filter-name">IRONROCK</span>
                            <span class="filter-result-qty">(36)</span>
                        </a>
                    </dd>
                    <dd>
                        <a href="#">
                            <span class="filter-name">i867</span>
                            <span class="filter-result-qty">(22)</span>
                        </a>
                    </dd>
                    <dd>
                        <a href="#">
                            <span class="filter-name">G7 Power</span>
                            <span class="filter-result-qty">(17)</span>
                        </a>
                    </dd>
                    <dd>
                        <a href="#">
                            Ver todos
                        </a>
                    </dd>
                </dl>
            </aside>


            <section clas="productos">
                <a href="productoDetalle.php" class="irDescripcion"><!--Saque el onclick por que pertenece a javascript--->
                <article >
                    <div class="img-container">
                        <img src="img/phone.jpg" alt="">
                    </div>
                    <div class="descripcion">
                        <div class="price">
                        <span class="price-symbol">$</span>
                        <span class="price-value">948</span>
                    </div>
                    <div class="descripcion-text">
                        Descripción
                    </div>
                    <div class="vendedor">
                        Vendedor
                    </div>
                    <div class="cantidad-vendidos">
                        206
                    </div>
                    </div>
                </article>
            </a>
            <a href="productoDetalle.php" class="irDescripcion">
                <article >
                    <div class="img-container">
                        <img src="img/phone.jpg" alt="">
                    </div>
                    <div class="descripcion">
                        <div class="price">
                            <span class="price-symbol">$</span>
                            <span class="price-value">948</span>
                        </div>
                        <div class="descripcion-text">
                            Descripción
                        </div>
                        <div class="vendedor">
                            Vendedor
                        </div>
                        <div class="cantidad-vendidos">
                            206
                        </div>
                    </div>
                </article>
            </a>
                <a href="productoDetalle.php" class="irDescripcion">
                <article >
                    <div class="img-container">
                        <img src="img/phone.jpg" alt="">
                    </div>
                    <div class="descripcion">
                        <div class="price">
                        <span class="price-symbol">$</span>
                        <span class="price-value">948</span>
                    </div>
                    <div class="descripcion-text">
                        Descripción
                    </div>
                    <div class="vendedor">
                        Vendedor
                    </div>
                    <div class="cantidad-vendidos">
                        206
                    </div>
                    </div>
                </article>
            </a>
                <a href="productoDetalle.php" class="irDescripcion">
                <article >
                    <div class="img-container">
                        <img src="img/phone.jpg" alt="">
                    </div>
                    <div class="descripcion">
                        <div class="price">
                        <span class="price-symbol">$</span>
                        <span class="price-value">948</span>
                    </div>
                    <div class="descripcion-text">
                        Descripción
                    </div>
                    <div class="vendedor">
                        Vendedor
                    </div>
                    <div class="cantidad-vendidos">
                        206
                    </div>
                    </div>
                </article>
            </a>
                <a href="productoDetalle.php" class="irDescripcion">
                <article >
                    <div class="img-container">
                        <img src="img/phone.jpg" alt="">
                    </div>
                    <div class="descripcion">
                        <div class="price">
                        <span class="price-symbol">$</span>
                        <span class="price-value">948</span>
                    </div>
                    <div class="descripcion-text">
                        Descripción
                    </div>
                    <div class="vendedor">
                        Vendedor
                    </div>
                    <div class="cantidad-vendidos">
                        206
                    </div>
                    </div>
                </article>
            </a>
                <a href="productoDetalle.php" class="irDescripcion">
                <article >
                    <div class="img-container">
                        <img src="img/phone.jpg" alt="">
                    </div>
                    <div class="descripcion">
                        <div class="price">
                        <span class="price-symbol">$</span>
                        <span class="price-value">948</span>
                    </div>
                    <div class="descripcion-text">
                        Descripción
                    </div>
                    <div class="vendedor">
                        Vendedor
                    </div>
                    <div class="cantidad-vendidos">
                        206
                    </div>
                    </div>
                </article>
            </a>
                <a href="productoDetalle.php" class="irDescripcion">
                <article >
                    <div class="img-container">
                        <img src="img/phone.jpg" alt="">
                    </div>
                    <div class="descripcion">
                        <div class="price">
                        <span class="price-symbol">$</span>
                        <span class="price-value">948</span>
                    </div>
                    <div class="descripcion-text">
                        Descripción
                    </div>
                    <div class="vendedor">
                        Vendedor
                    </div>
                    <div class="cantidad-vendidos">
                        206
                    </div>
                    </div>
                </article>
                </a>
                <a href="productoDetalle.php" class="irDescripcion">
                <article >
                    <div class="img-container">
                        <img src="img/phone.jpg" alt="">
                    </div>
                    <div class="descripcion">
                            <div class="price">
                            <span class="price-symbol">$</span>
                            <span class="price-value">948</span>
                        </div>
                        <div class="descripcion-text">
                            Descripción
                        </div>
                        <div class="vendedor">
                            Vendedor
                        </div>
                        <div class="cantidad-vendidos">
                            206
                        </div>
                    </div>
                </article>
                </a>
                <div class="pagination-container">
                    <ul>
                        <li><a href=""><i class='fas'>&#xf104;</i> Anterior</a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li><a href="">6</a></li>
                        <li><a href="">7</a></li>
                        <li><a href="">8</a></li>
                        <li><a href="">9</a></li>
                        <li><a href="">10</a></li>
                        <li><a href="">Siguiente <i class='fas'>&#xf105;</i></a></li>
                    </ul>
                </div>
            </section>
        </div>
    </main>







      <!-- MainBody End ============================= -->
   <!-- Modal -->
   <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalScrollableTitle">Carrito</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered">
                <thead>
                  <!--Fila de detalle de cada producto-->
                  <tr>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Quantity/Update</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  <!--Filas y columnas-->
                  <tr>
                    <td> <img width="60" src="img/phone.jpg" alt="phone.jpg"/></td>
                    <td>MASSA AST<br/>Color : black, Material : metal</td>
                    <td>
                      <div class="input-append">
                        <input class="span1" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text">
                        <button class="btn" type="button">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button class="btn" type="button">
                          <i class="fas fa-plus"></i>
                        </button>
                        <button class="btn btn-danger" type="button">
                          <i class="far fa-times-circle"></i>
                        </button>
                      </div>
                    </td>
                    <td>$120.00</td>
                  </tr>
                  <tr>
                    <td> <img width="60" src="img/phone.jpg" alt="phone.jpg"/></td>
                    <td>MASSA AST<br/>Color : black, Material : metal</td>
                    <td>
                      <div class="input-append">
                        <input class="span1" style="max-width:34px" placeholder="1"  size="16" type="text">
                        <button class="btn" type="button">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button class="btn" type="button">
                          <i class="fas fa-plus"></i>
                        </button>
                        <button class="btn btn-danger" type="button">
                          <i class="far fa-times-circle"></i>
                        </button>
                      </div>
                    </td>
                    <td>$7.00</td>
                  </tr>
                  <tr>
                    <td> <img width="60" src="img/phone.jpg" alt="phone.jpg"/></td>
                    <td>MASSA AST<br/>Color : black, Material : metal</td>
                    <td>
                      <div class="input-append">
                        <input class="span1" style="max-width:34px" placeholder="1"  size="16" type="text">
                        <button class="btn" type="button">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button class="btn" type="button">
                          <i class="fas fa-plus"></i>
                        </button>
                        <button class="btn btn-danger" type="button">
                          <i class="far fa-times-circle"></i>
                        </button>
                      </div>
                    </td>
                    <td>$120.00</td>
                  </tr>
                  <!--Fila que muestra el total del carrito-->
                  <tr>
                    <td colspan="3" style="text-align:right">Total Price:	</td>
                    <td> $228.00</td>
                  </tr>
                  <tr>
                    <td colspan="3" style="text-align:right">Total Discount:	</td>
                    <td> $50.00</td>
                  </tr>
                  <tr>
                    <td colspan="3" style="text-align:right">Total Tax:	</td>
                    <td> $31.00</td>
                  </tr>
                  <tr>
                    <td colspan="3" style="text-align:right"><strong>TOTAL ($228 - $50 + $31) =</strong></td>
                    <td class="label label-important" style="display:block"> <strong> $155.00 </strong></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin modal -->



<!-- Footer ================================================================== -->
<?php
  include_once("includes/footer.php");
  ?>
<!-- Footer End================================================================== -->
  <?php
    include_once("includes/scriptBootstrap.php")
  ?>



<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
