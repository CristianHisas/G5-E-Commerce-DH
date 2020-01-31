<?php
//require_once ('includes/pdo.php');

require_once 'clases/Conexion.php';
require_once 'clases/Marca.php';
require_once 'clases/Categoria.php';
require_once 'clases/Producto.php';
include_once("includes/funciones.php");
include_once("includes/baseDeDatos.php");
$producto = new Producto();
$msj="";
$img="";
$errores=null;


if (isset($_POST["btnCargar"])&& $_POST ){
  /**
   * 
   */
  $datos=[
    "nombre" =>trim($_POST["nombre"]),
    "descripcion" =>trim($_POST["descripcion"]),
    "precio" =>trim($_POST["precio"]),
    "stock" =>trim($_POST["stock"]),
    "marca" =>trim($_POST["marca"]),
    "categoria" =>trim($_POST["categoria"]),
    "descuento" =>trim($_POST["descuento"])
  ];
  /***
   * 
   */
  $requisitos = [
    "nombre"=>[
      MINSIZE=>2,
      MAXSIZE => 30
    ],
    "descripcion" => [
        MAXSIZE => 10000
    ],
    "precio" => [
        MINSIZE => 1,
        PositivoFloat
    ],
    "stock" => [
      MINSIZE => 1,
      SOLONUMEROS,
      Positivo,
    ],
    "marca" => [
      MINSIZE => 1,
      SOLONUMEROS,
      Positivo,
      Marca
    ],
    "categoria" => [
      MINSIZE => 1,
      SOLONUMEROS,
      Positivo,
      Categoria
    ],
    "descuento" => [
      MINSIZE => 1,
      Descuento
    ]
];
  /**
   * 
   * 
   */
  
  if($_FILES){
    $errorArchivo=( validarArchivo($_FILES["img"]) );
  }
  /**
   * 
   */
  $errores = hacerValidaciones($datos, $requisitos);
  if($errorArchivo){
    $errores["img"]=$errorArchivo;
  }else{
    
    if($_FILES["img"]["name"]!="" && $_FILES){
      $img=Producto::guardarArchivo($_FILES["img"],$_POST["nombre"]);  
    }else{
      $img=$_POST["imagenActual"];
    }
  }
  /**
   * 
   */
  //var_dump($_POST);
  //var_dump($_FILES);
  
  /**
   * 
   */
  if(!$errores){
    $producto->altaProducto($img,$datos);
    $msj="success";
  }else{
    $datos["img"]=$img;
    //var_dump($datos);
    foreach ($datos as $key => $value) {
      $valorPersistencia[$key]=persistirDatoGeneral($errores,$key,$datos);
    }
    //var_dump($valorPersistencia);
    $msj="danger";
  }
  /**
   * 
   */
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio= $_POST["precio"];
    $stock = $_POST["stock"];
    $marca = $_POST["marca"];
    $categoria = $_POST["categoria"];
    $descuento = $_POST["descuento"];
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include 'includes/head.php';?>
<title>ABM Productos</title>

<body>

  <?php include 'includes/headerAdm.php'; ?>

  <main>
    
    <div class="container-fluir my-3">
      <div id="accordion">
        <div class="card">
          <div class="card-header " id="headingFour">
            <h5 class="mb-0 d-flex justify-content-between align-items-center">
              <button class="btn btn-link mr-3 collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              Agregar Producto
              </button>
              <p class="btn alert alert-<?=$msj;?>" role="alert">
                <?php 
                  if($msj=="success"){
                    echo("Producto se agregada correctamente.");
                  } 
                  if($msj=="danger"){
                    echo("No se pudo agregar el Producto");
                  }
                ?>
              </p>
              <a href="abmProducto.php" class=" btn btn-primary ml-3">Volver a principal</a>
            </h5>
          </div>
          <div id="collapseFour" class="collapse carrito-resumen" aria-labelledby="headingFour" data-parent="#accordion">
          <div class="card-body ">
              <form class="altaProducto" action="" method="post" enctype="multipart/form-data">

              <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="<?=(isset($valorPersistencia["nombre"]))?$valorPersistencia["nombre"]:"" ;?>" require>
                  <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"nombre"):""; ?></small>
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <textarea class="form-control" id="descripcion" rows="8" cols="80" name="descripcion" value=""><?=( isset($valorPersistencia["descripcion"]))?$valorPersistencia["descripcion"]:"" ;?></textarea>
                  <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"descripcion"):""; ?></small>
                </div>
                <div class="form-group">
                  <label for="precio">Precio:</label>
                  <input type="text" class="form-control " id="precio" name="precio" min="0" value="<?=(isset($valorPersistencia["precio"]))?$valorPersistencia["precio"]:"0" ;?>" require >
                  <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"precio"):""; ?></small>
                </div>
                <div class="form-group">
                  <label for="stock">stock</label>
                  <input type="text" class="form-control" id="stock" name="stock" min="0" value="<?=(isset($valorPersistencia["stock"]))?$valorPersistencia["stock"]:"0" ;?>" require>
                  <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"stock"):""; ?></small>
                </div>
                <div class="form-group">
                  <label for="marca">Marca</label>
                  <select class="form-control" id="marca" name="marca">
                      <option value="0" >Seleccionar</option>


                    <?php
                      $marca=new Marca();
                      $marcas=$marca->listarMarcas();
                      $marcaElegida=(isset($valorPersistencia["marca"]))?$valorPersistencia["marca"]:"" ;
                      foreach ($marcas as $key => $value) {
                        if($value["id_marca"]==$marcaElegida){ ?>
                        <option value="<?=$value["id_marca"];?>" selected><?=$value["marca"];?></option>
                    <?php 
                        }else{
                    ?>
                        <option value="<?=$value["id_marca"];?>"><?=$value["marca"];?></option>
                    <?php
                      } 
                    ?>

                      
                    <?php 
                      } 
                    ?>


                  </select>
                  <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"marca"):""; ?></small>
                </div>
                <div class="form-group">
                  <label for="categoria">Categoria</label>
                  <select class="form-control" id="categoria" name="categoria">
                    <option value="0" >Seleccionar</option>


                  <?php
                      $categoria=new Categoria();
                      $categorias=$categoria->listarcategorias();
                      $categoriaElegida=(isset($valorPersistencia["categoria"]))?$valorPersistencia["categoria"]:"" ;
                      foreach ($categorias as $key => $value) {
                        if($value["id_categoria"]==$categoriaElegida){ 
                  ?>
                      <option value="<?=$value["id_categoria"];?>" selected><?=$value["categoria"];?></option>
                    <?php 
                        }else{
                    ?>
                        <option value="<?=$value["id_categoria"];?>"><?=$value["categoria"];?></option>
                    <?php
                      } 
                    ?>
                  <?php 
                      } 
                  ?>


                  </select>
                  <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"categoria"):""; ?></small>
                </div>
                <div class="form-group">
                  <label for="descuento">descuento</label>
                  <input type="text" class="form-control" id="descuento" name="descuento"  pattern="(^0?|^[1-9]{1}+[0-9]{1})+([\.]([0-9]){1,2})?$"  value="<?=( isset($valorPersistencia["descuento"]))?$valorPersistencia["descuento"]:"0" ;?>" >
                  <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"descuento"):""; ?></small>
                </div>
                <div class="form-group text-center">
                  <label for="" class="col-12">Imagen</label>
                  <input type="text" name="imagenActual" value="<?=(isset($valorPersistencia["img"]))?$valorPersistencia["img"]:"img/Productos/phone.png";?>" readonly hidden>
                  <img src="<?=(isset($valorPersistencia["img"]))?$valorPersistencia["img"]:"img/Productos/phone.png" ;?>" alt="" sizes="" width="" class="" height="300px">
                  <label for="img" class="text-left col-12">Cambiar</label>
                  <input type="file" class="form-control-file" id="img" name="img" class="">
                  <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"img"):""; ?></small>
                </div>


                <button type="submit" class="btn btn-primary mb-2" name="btnCargar" value="cargar">Cargar</button>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

  <?php
  include 'includes/footer.php';
  include 'includes/scriptBootstrap.php';
  ?>

</body>
</html>