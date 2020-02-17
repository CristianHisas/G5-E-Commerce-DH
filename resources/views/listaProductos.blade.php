<?php
  session_start();
  //include_once("../includes/funciones.php");
  //include_once("../includes/baseDeDatos.php");
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
@extends('layouts.app')
@section('csspersonal')
"{{ asset('/css/styles.css') }}"
@endsection
@section('content')
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
            <?php
              foreach ($productos as $key => $value) {                
            ?>
                <a href="productoDetalle?c=<?=$value->id_categoria;?>" class="irDescripcion"><!--Saque el onclick por que pertenece a javascript--->
                <article >
                    <div class="img-container">
                     <!--   <img src="img/phone.jpg" alt=""> -->
                        <img src="<?=$value->img;?>" alt="" sizes="" width="80%" class="zoom">
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
    @endsection
