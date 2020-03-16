<?php
  $pagina="Datos de Usuario";

?>
@extends('layouts.app')
@section('csspersonal')
"{{ asset('/css/styles.css') }}"
@endsection
@section('content')
    <main class="container mb-4">
        <div class="inner-main" id="lista-productos">
            <aside>
                <dl>
                    <dt>
                        Categoria
                    </dt> 

                    <?php       
                        foreach ($categorias as $key => $value) {                                 
                    ?>   
                           <dd>
                               <a href="/listaProductos/{{$value->id_categoria}}">
                                  <span class="filter-name"><?=$value->categoria;?></span>
                                  <span class="filter-result-qty">({{$value->get_productos_count}})</span>
                               </a>
                           </dd> 
                    <?php
                     }
                    ?>                        

                </dl>
                <dl>
                    <hr>
                    <dt>
                        Marca
                    </dt>
                    <?php       
                        foreach ($marcas as $key => $value) 
                        {       
                                                                                 
                    ?>   
                           <dd>
                               <a href="/listaProductos/{{$cat=0}}/{{$value->id_marca}}">

                                  <span class="filter-name"><?=$value->marca;?></span>
                                  <span class="filter-result-qty">({{$value->get_productos_count}})</span>
                              </a>
                           </dd> 
                    <?php
                     }
                    ?>   
                </dl>
            </aside>


            <section clas="productos">
            <?php
              foreach ($productos as $key => $value) {
            ?>
            <a href="/productoDetalle/{{$value->id_producto}}" class="irDescripcion"><!--Saque el onclick por que pertenece a javascript--->
                <article >
                    <div class="img-container ">
                     <!--   <img src="img/phone.jpg" alt=""> -->
                        <img src="<?=$value->img;?>" alt="" sizes="" width="80%" height="" class="zoom mt-1">
                    </div>
                    <div class="descripcion">
                        <div class="price">
                        <span class="price-symbol">$</span>
                        <span class="price-value"><?=$value->precio;?></span>
                    </div>
                    <div class="descuento">
                    <?=$value->descuento;?>%OFF
                    </div>
                    <div class="descripcion-text">
                    <?=$value->nombre;?>
                    </div>
                   <!-- <div class="vendedor">
                        Vendedor
                    </div> -->
                    <div >stock:
                    <?=$value->cantidad;?>
                    </div>

                    </div>
                </article>
            </a>
            <?php
              }
            ?>

            <span class="form-control-plaintext mx-auto d-linea">{{$productos->links()}}</span>
            </section>
        </div>
    </main>
    @endsection
