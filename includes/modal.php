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
