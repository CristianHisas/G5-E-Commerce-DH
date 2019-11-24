<footer class="">
  <!-- Footer ================================================================== -->
  <div class="container-fluid bg-dark px-auto py-4 footer-cambiado ">
    <div class="row d-flex justify-content-between">
      <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xd-4">
        <h5>ACCOUNT</h5>
        <a href="login.html" class="">YOUR ACCOUNT</a>
        <a href="login.html">PERSONAL INFORMATION</a>
        <a href="login.html">ADDRESSES</a>
        <a href="login.html">DISCOUNT</a>
        <a href="login.html">ORDER HISTORY</a>
      </div>
      <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xd-4">
        <h5>INFORMATION</h5>
        <a href="contacto.html">CONTACT</a>
        <a href="registro.html">REGISTRATION</a>
        <a href="legal_notice.html">LEGAL NOTICE</a>
        <a href="tac.html">TERMS AND CONDITIONS</a>
        <a href="faq.html">FAQ</a>
      </div>
      <div id="" class="col-12 col-sm-4 col-md-4 col-lg-4 col-xd-4 social text-center">
          <h5 class="social">SOCIAL MEDIA </h5>
          <a href="#" class="social"><img width="60" height="60" src="https://live.staticflickr.com/65535/49093342407_45310a774c_o.png" title="facebook" alt=""/></a>
          <a href="#" class="social"><img width="60" height="60" src="https://live.staticflickr.com/65535/49092642883_c0782ddd4d_o.png" title="twitter" alt=""/></a>
          <a href="#" class="social"><img width="60" height="60" src="https://live.staticflickr.com/65535/49092641488_040001d127_o.png" title="youtube" alt=""/></a>
        </div>
    </div>
    <p class="mx-auto text-center my-2 py-2">Copyright &copy; Your Website 2019</p>
  </div>
  <!-- Footer End================================================================== -->
</footer>
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
