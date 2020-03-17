<?php
session_start();
$pagina="Descriccion de Producto";
if(isset($_SESSION["activeUser"]) && !is_null($_SESSION["activeUser"])){
  if($_SESSION["activeUser"]["fotoPerfil"]==""){
    $_SESSION["activeUser"]["fotoPerfil"]=(isset($imagenUsuario))?$imagenUsuario:"img/perfil.png";
  }
  $activeUser=$_SESSION["activeUser"];
}
?>
@extends('layouts.app')
@section('csspersonal')
  "{{ asset('/css/styles.css') }}"
@endsection
@section('content')
  <main class="">
    <div class="inner-main">
      <h1 class="faq-h1">Preguntas frecuentes</h1>
      <div class="accordion" id="accordionFaq">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Cómo devolver un producto
              </button>
            </h2>
          </div>

          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionFaq">
            <div class="card-body">
              <div class="content__data"><h2>1. Pedí la devolución del producto</h2>
                <p dir="ltr">Para devolver un producto, <strong>buscá la opción “Devolver o cambiar gratis”</strong> que aparece en el menú de la compra que ya no querés y seguí los pasos. Te vamos a dar una etiqueta de devolución gratis para que envíes el producto de vuelta. Según la información que tengamos sobre la devolución, a veces te vamos a pedir que hables con el vendedor antes de tener la etiqueta.</p>
                <p dir="ltr">También vas a tener que hablar con el vendedor si al comprar acordaste la entrega con él. Sin embargo, en esos casos no te vamos a dar una etiqueta, sino que tendrán que ponerse de acuerdo sobre cómo continuar.</p>
                <h2 dir="ltr">2. Prepará el paquete para enviarlo</h2>
                <p dir="ltr">Antes de preparar el paquete, revisá que el producto esté en las mismas condiciones que lo recibiste, sin usar y con todos sus accesorios y etiquetas.</p>
                <ul>
                  <li dir="ltr">
                    <p dir="ltr">Guardá el producto en su envoltorio original o en uno alternativo si no lo tenés.&nbsp;</p>
                  </li>
                  <li dir="ltr">
                    <p dir="ltr">Embalá el producto. Si es frágil, utilizá un embalaje seguro que lo proteja.&nbsp;</p>
                  </li>
                  <li dir="ltr">
                    <p dir="ltr">Imprimí la etiqueta de devolución y pegala en el paquete.</p>
                  </li>
                  <li dir="ltr">
                    <p dir="ltr">Entregá el paquete al correo.</p>
                  </li>
                </ul>
                <p dir="ltr">Si compraste más de una unidad del mismo producto, tenés que devolver todos los artículos para recuperar tu dinero.</p>
                <h2 dir="ltr">3. Recibí el reembolso del dinero</h2>
                <p dir="ltr">En la mayoría de los casos, <strong>hacemos los reembolsos cuando el correo nos avisa que entregaste el producto</strong>.&nbsp;</p>
                <p dir="ltr">Sin embargo, <strong>a veces hacemos el reembolso después de que el paquete le llega al vendedor</strong> y nos confirma que está bien, para asegurarnos de que no hubo ningún problema.&nbsp;</p>
                <p dir="ltr">Si querés saber cuánto tardará en acreditarse tu reembolso, podés consultar <a href="https://www.mercadolibre.com.ar/ayuda/5266">los tiempos de acreditación de cada medio de pago</a>.</p></div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingOne2">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
                  Cómo vender de manera segura
                </button>
              </h2>
            </div>

            <div id="collapseOne2" class="collapse" aria-labelledby="headingOne2" data-parent="#accordionFaq">
              <div class="card-body">
                <div class="content__data"><div class="wrap-content">
                  <p>¿Tuviste tu primera venta? Te damos algunos consejos para tener en cuenta si ya recibiste una oferta en tu publicación.</p>
                  <h3>Presta atención si se comporta raro</h3>
                  <p>Estate atento si:</p>
                  <ul>
                    <li>Está apurado o te pide que le envíes el producto antes de pagarte.</li>
                    <li>Quiere llevarse cualquier producto si ya no tienes stock del que compró.</li>
                    <li>Cambia de dirección o modo de envío.</li>
                    <li>No te da un teléfono fijo donde puedas contactarlo.</li>
                    <li>Los datos que te dio no coinciden con los que tiene en el sitio.</li>
                  </ul>
                  <h3>Toma la iniciativa</h3>
                  <p>Si pasan unos días y no te contacta, llámalo tú para encaminar la venta.</p>
                </div></div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Cómo pagar tu compra
                </button>
              </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionFaq">
              <div class="card-body">
                <div id="cxMainContent" class="cx-main--content cx-main--content__grow ui-list__shadow-wrapper"><div class="content__data"><div class="wrap-content">
                  <p><strong>Pagá con Mercado Pago</strong> y tu compra <a href="https://www.mercadolibre.com.ar/ayuda/Compra_Protegida_986">va a estar 100% protegida</a>, si el producto no es lo que esperabas te devolvemos el dinero.</p>
                  <p>Las reservas de vehículos y las contrataciones de servicios también se pagan con Mercado Pago. Así protegemos tu dinero hasta que nos confirmes que ya te entregaron el vehículo o te brindaron el servicio.</p>
                  <p>Elegí&nbsp;entre cualquiera de estos medios de pago:</p>
                </div>
                <div class="wrap-content">
                  <div class="responsive-table">
                    <div class="column-fixed">
                      <table class="ch-datagrid table" summary="Cómo pagar tu compra">
                        <tbody>
                          <tr>
                            <td class="responsive-table-listing">
                              <ul>
                                <li class="paymentmethod-visa">Visa</li>
                                <li class="paymentmethod-master">Mastercard</li>
                                <li class="paymentmethod-amex">American Express</li>
                                <li class="paymentmethod-mercadopago_cc">Mercado Pago + Banco Patagonia</li>
                                <li class="paymentmethod-naranja">Naranja</li>
                                <li class="paymentmethod-argencard">Argencard</li>
                                <li class="paymentmethod-cabal">Cabal</li>
                                <li class="paymentmethod-cencosud">Cencosud</li>
                                <li class="paymentmethod-nativa">Nativa</li>
                                <li class="paymentmethod-tarshop">Tarjeta Shopping</li>
                                <li class="paymentmethod-cordobesa">Cordobesa</li>
                                <li class="paymentmethod-cmr">CMR</li>
                                <li class="paymentmethod-cordial">Cordial</li>
                              </ul>
                              <p><strong>Tarjeta de crédito</strong>.</p>
                            </td>
                            <td class="responsive-table-exposition">Hasta <strong>12 cuotas sin interés</strong> con <a href="http://www.mercadolibre.com.ar/gz/promociones-bancos">promociones bancarias</a>
                              <p><a title="Conoce los bancos o tarjetas con promoción de cuotas sin interés para pagar en Mercado Libre." href="http://ayuda.mercadolibre.com.ar/ayuda/Costos-de-financiaci-n-por-pag-ml_2955" target="_blank">Costo de financiación para pagos con tarjetas de crédito</a></p>
                            </td>
                            <td class="responsive-table-exposition">Se acredita instantáneamente</td>
                          </tr>
                          <tr>
                            <td class="responsive-table-listing">
                              <ul class="payment-method-list">
                                <li class="paymentmethod-visa">Visa</li>
                                <li class="paymentmethod-maestro">Maestro</li>
                                <li class="paymentmethod-debcabal">Cabal</li>
                              </ul>
                              <p><strong>Tarjeta</strong> <strong>de </strong><strong>débito.</strong></p>
                            </td>
                            <td class="responsive-table-exposition">1 pago</td>
                            <td class="responsive-table-exposition">Se acredita instantáneamente</td>
                          </tr>
                          <tr>
                            <td class="responsive-table-listing">
                              <ul class="payment-method-list">
                                <li class="paymentmethod-rapipago">Rapipago</li>
                                <li class="paymentmethod-pagofacil">Pago Fácil</li>
                                <li class="paymentmethod-cargavirtual">Carga Virtual</li>
                              </ul>
                              <p><strong>En</strong> <strong>efectivo </strong>con<strong> Rapipago</strong>,<strong> Pago Fácil</strong> y<strong> Carga Virtual</strong>: te&nbsp;damos un número para pagar.</p>
                            </td>
                            <td class="responsive-table-exposition">1 pago</td>
                            <td class="responsive-table-exposition">Se acredita instantáneamente</td>
                          </tr>
                          <tr>
                            <td class="responsive-table-listing">
                              <ul>
                                <li class="paymentmethod-bapropagos">BaproPagos</li>
                              </ul>
                              <p><strong>En efectivo </strong>con<strong>&nbsp;Provincia NET</strong>:&nbsp;imprimí tu factura y acercate&nbsp;a pagar.</p>
                            </td>
                            <td class="responsive-table-exposition">1 pago.</td>
                            <td class="responsive-table-exposition">Pagás, y se acredita <strong>en 1 día hábil</strong></td>
                          </tr>
                          <tr>
                            <td class="responsive-table-listing">
                              <ul class="payment-method-list">
                                <li class="paymentmethod-account_money">Dinero en cuenta MercadoPago</li>
                              </ul>
                              <p><strong>Dinero en tu cuenta</strong>: tu dinero disponible en Mercado Pago se transfiere al instante a la cuenta del receptor.</p>
                            </td>
                            <td class="responsive-table-exposition">1 pago</td>
                            <td class="responsive-table-exposition">Se acredita instantáneamente</td>
                          </tr>
                        </tbody>
                      </table>
                      <p class="helpTip"><br>* No disponible para reventa de entradas.</p>
                    </div>
                  </div>
                </div>
                <p>En publicaciones de subastas también&nbsp;podés elegir acordar el pago con el vendedor. Si pagás de esta forma, te recomendamos:</p>
                <ul>
                  <li>Evitar usar servicios de transferencia de dinero que no permitan verificar la identidad de tu contraparte.</li>
                  <li>Asegurarte de que el titular de la cuenta bancaria en la que vayas a depositar coincida con los datos de contacto del vendedor.</li>
                  <li>Guardar los comprobantes de pago.</li>
                  <li>No pagar una factura enviada por un vendedor. Al terminar la compra&nbsp;podés imprimir tu propia factura.</li>
                </ul>
                <p>&nbsp;</p>
                <div>
                  <p><a class="ch-btn" href="https://www.mercadolibre.com.ar/ayuda/purchases">Tengo un problema con un pago</a></p>
                </div></div><div class="cx-main--content__effectivitySurvey"><div class="cx-effectivity__content"><h3>¿Te ayudó la información?</h3><div class="cx-effectivity__icons"><div role="presentation" class="cx-effectivity__positive cx-effectivity__icons-circle"><div class="cx-effectivity__icons-yes"></div></div><div role="presentation" class="cx-effectivity__negative cx-effectivity__icons-circle"><div class="cx-effectivity__icons-no"></div></div></div></div></div></div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Agregar stock, pausar, eliminar y reactivar una publicación
                </button>
              </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionFaq">
              <div class="card-body">

                <div class="wrap-content">
                  <h2>Agregar stock</h2>
                  <p>Si publicás productos nuevos en Clásica, quedarán inactivas automáticamente cuando te quedes sin stock. Si querés reactivar tu publicación, podrás hacerlo de forma individual, o masivamente, desde el <a href="https:/www.mercadolibre.com.ar/publicaciones/editor-masivo/#label=paused">editor masivo.</a></p>
                  <p>Si, en cambio, vendés productos usados, tus publicaciones&nbsp;van a finalizar automáticamente cuando no tengas más stock. Si&nbsp;querés volver a activarlas&nbsp;tenés que crear una nueva publicación.</p>
                </div>
                <div class="wrap-content">
                  <h2>Pausar</h2>
                  <p>Si&nbsp;querés pausar tu publicación tené en cuenta que:</p>
                  <ul>
                    <li>El tiempo de exposición de tu publicación Gratuita seguirá corriendo, aunque no aparezca en los listados.</li>
                    <li>Tu producto publicado en Clásica no se&nbsp;va a ver en los listados, hasta que lo reactives nuevamente.</li>
                  </ul>
                </div>
                <div class="wrap-content">
                  <h2>Eliminar</h2>
                  <p>Podés eliminar una publicación siempre que esté inactiva. Tené en cuenta que una vez eliminada, no vas a poder recuperarla.</p>
                </div>
                <div class="wrap-content">
                  <h2>Republicar un producto</h2>
                  <p>Podés&nbsp;republicar sin cambios o modificar la publicación antes de hacerlo.</p>
                  <p>Si está inactiva y queres reactivarla, asegurate de hacerlo antes de que pasen 60 días, de esta forma vas a mantener&nbsp;las ventas, visitas y preguntas pendientes. Tené en cuenta que si editás el título lo consideraremos una publicación nueva, y&nbsp;va a perder la cantidad de ventas y visitas acumuladas.</p>
                </div>
                <div class="wrap-content">
                  <h2>Republicar en Clasificados</h2>
                  <p>Si republicás un vehículo, inmueble o servicio dentro de los 60 días,&nbsp;mantenés las visitas.</p>
                  <p>Pero además, los inmuebles se pueden republicar gratis dentro de los 30 días, aunque sin exposición en las páginas principales.</p>
                  <p>&nbsp;</p>
                </div></div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  @endsection
