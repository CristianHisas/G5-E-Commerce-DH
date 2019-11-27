<?php
  $pagina="Resumen";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include_once("includes/headPerfil.php")
  ?>
  <link rel="stylesheet" href="css/stylePerfilSeguridadResumen.css">
  <title>E-commerce</title>
</head>
<body class="main-perfil">
<!--Comienza el header-->
    <header class="container-fluir fixed-top">
      <?php
        include_once("includes/headerPerfil.php");
      ?>
    </header>
<!--Fin el header-->
    <main class="mx-xl-auto" >
    <div class="container contenedor">
        <div class="row">
<!--ubicacion-->
<?php
    include_once("includes/ubicacionPerfil.php");
?>
<!--ubicacion-->
<!--menu izquierdo-->
<?php
    include_once("includes/menuIzquierdoPerfil.php");
?>
<!--menu izquierdo-->
        <!-----Resumen-------------------------------->
          <div class="col-12 col-sm-12 col-md-9  col-lg-9 mb-4 resumen">
                    <h1 class="d-block">Resumen</h1>
          <!--comienzo del carrito actual--->
          <h2 class="col-12 my-4" id="summary">Carrito de Compras</h2>
           <div class="carrito-resumen" >

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
            <p><button  type="button" class="btn btn-secondary ml-md-auto boton-efecto">Vaciar Carrito</button><button type="button" class="btn btn-secondary ml-md-auto boton-efecto">Comprar</button></p>
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
                              <a href="factura/factura-ejemplo.pdf" download="factura-ejemplo.pdf" class="d-block"><p><img src="img/pdf.png" alt=""></p></a>
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
                            <a href="descargar.html" class="d-block"><p><img src="img/pdf.png" alt=""></p></a>
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
                        <a href="descargar.html" class="d-block"><p><img src="img/pdf.png" alt=""></p></a>
                    </div>
                </div>
              <!--fin Fila -->
                    </div>
           <!--fin Facturas------------------------------- -->
          </div>
    <!-----Fin Resumen-------------------------------->
    </div>
</div>
      <!-- MainBody End ============================= -->
</main>
<!-- Footer ================================================================== -->
  <?php
  include_once("includes/footer.php");
  ?>
<!-- Footer End================================================================== -->
  <?php
    include_once("includes/scriptBootstrap.php")
  ?>
  <script src="https://kit.fontawesome.com/67f61afa3e.js" crossorigin="anonymous"></script>
</body>
</html>
