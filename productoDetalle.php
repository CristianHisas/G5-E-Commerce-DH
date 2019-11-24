<!DOCTYPE html>
<html lang="en">

<?php include_once "includes/head.php" ?>

<body>

  <?php include_once "includes/header.php"; ?>
  <?php include_once "includes/modal.php" ?>

  <!--Main-->
  <main>
        <div class="container" id="mainContainer">

          <?php include_once "includes/navBar.php" ?>

          <hr>

          <div class="row" id = "seccionProducto">

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" id="imagenProducto">
              <a href="img/phone.jpg" title="Phone example">
                <img src="img/phone.jpg" style="width:100%" alt="Phone example"/>
              </a>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" id="descProducto">
              <h3>Phone example</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

              <form class="form-horizontal qtyFrm">
                <div class="control-group">
                  <label class="control-label"><span>$222.00</span></label>
                  <div class="controls">
                    <input class="cantidad" type="number" name="numero" value="1" min="1"
                    max="50" placeholder="Cantidad"/>
                    <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart  <i class="fas fa-shopping-cart"></i></button>
                  </div>
                </div>
              </form>

              <form class="form-horizontal qtyFrm pull-right">
                <div class="control-group">
                  <label class="control-label"><span>Color</span></label>
                  <div class="controls">
                    <select>
                      <option>Black</option>
                      <option>Red</option>
                      <option>Blue</option>
                      <option>Brown</option>
                    </select>
                  </div>
                </div>
              </form>

              <br>

              <h4>Métodos de pago</h4>
              <img src="img/payment_methods.png" alt="payment_methods.png">
            </div>
          </div>

          <hr>

          <div class="row" id="seccionInfoProducto">
              <div class="col-12">
                <h4>Product Information</h4>
                <table class="table table-bordered">
                  <tbody>
                    <tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2">Fujifilm</td></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Model:</td><td class="techSpecTD2">FinePix S2950HD</td></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Released on:</td><td class="techSpecTD2"> 2011-01-28</td></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Dimensions:</td><td class="techSpecTD2"> 5.50" h x 5.50" w x 2.00" l, .75 pounds</td></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Display size:</td><td class="techSpecTD2">3</td></tr>
                  </tbody>
                </table>
              </div>

              <div class="col-12">
                <h5>Features</h5>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>

                <h4>Editorial Reviews</h4>

                <h5>Manufacturer's Description </h5>
                <p>
                  With a generous 18x Fujinon optical zoom lens, the S2950 really packs a punch, especially when matched with its 14 megapixel sensor, large 3.0" LCD screen and 720p HD (30fps) movie capture.
                </p>

                <h5>Electric powered Fujinon 18x zoom lens</h5>
                <p>
                  The S2950 sports an impressive 28mm – 504mm* high precision Fujinon optical zoom lens. Simple to operate with an electric powered zoom lever, the huge zoom range means that you can capture all the detail, even when you're at a considerable distance away. You can even operate the zoom during video shooting. Unlike a bulky D-SLR, bridge cameras allow you great versatility of zoom, without the hassle of carrying a bag of lenses.
                </p>
                <h5>Impressive panoramas</h5>
                <p>
                  With its easy to use Panoramic shooting mode you can get creative on the S2950, however basic your skills, and rest assured that you will not risk shooting uneven landscapes or shaky horizons. The camera enables you to take three successive shots with a helpful tool which automatically releases the shutter once the images are fully aligned to seamlessly stitch the shots together in-camera. It's so easy and the results are impressive.
                </p>

                <h5>Sharp, clear shots</h5>
                <p>
                  Even at the longest zoom settings or in the most challenging of lighting conditions, the S2950 is able to produce crisp, clean results. With its mechanically stabilised 1/2 3", 14 megapixel CCD sensor, and high ISO sensitivity settings, Fujifilm's Dual Image Stabilisation technology combines to reduce the blurring effects of both hand-shake and subject movement to provide superb pictures.
                </p>
              </div>
          </div>
          <hr>
        </div>
  </main>
  <!--End main-->

  <?php include_once "includes/footer.php" ?>
  <?php include_once "includes/scriptBootstrap.php" ?>

</body>
</html>
