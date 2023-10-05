<?php
require"../../includes/app.php";

use App\Propiedad;
use App\vendedor;

use Intervention\Image\ImageManagerStatic as Image;

//debuguear($propiedad);
estaAutenticado();
 
//consulta para obtener todos los vendedorres

$vendedores= vendedor::all();

$errores= Propiedad::getErrores();




if($_SERVER["REQUEST_METHOD"]==="POST"){
  
  //Crea una nueva instacia
  $propiedad = new Propiedad ($_POST['propiedad']);

  //crear nombre unico.
$nombreImagen = md5(uniqid(rand(),true)).".jpg";

  //Setear la imagen
  //Realiza un resize a la imagen con intervention
  if($_FILES['propiedad']['tmp_name']['imagen']){
     $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
     $propiedad->setImagen($nombreImagen);
  }

  //Validar
  $errores = $propiedad->validar();


// Asignar files hacia una variable.
$titulo = $_POST['titulo'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$habitaciones = $_POST['habitaciones'];
$wc = $_POST['wc'];
$estacionamiento = $_POST['estacionamiento'];
$vendedores_id = $_POST['vendedores_id']; 


//Revisar que el array de errores este vacio
if(empty($errores)){

  //Crear la carpeta para subir la imagen
  if(!is_dir(CARPETA_IMAGENES)){
    mkdir(CARPETA_IMAGENES);
  }

//subir la imagen
//Guardar la imagen en el servidor
$image->save(CARPETA_IMAGENES.$nombreImagen);
  
//Insertar en la base de datos
$retesultado =  $propiedad->guardar();


}

}
 ////required es para que el campo sea obligatorio.
incluirTemplate("header");
?>
    <main class="contenedor seccion">
      <h1>Crear</h1>
      <a href="/BienesRaices_POO/admin/index.php" class="boton boton-verde">Vorver</a>
    
      <?php foreach($errores as $error): ?>
   <div class="alerta error">
    <?php echo $error;?>
    
  </div>
      
      <?php endforeach;?>


      <form class="formulario" method="POST" action="/BienesRaices_POO/admin/propiedades/crear.php" enctype="multipart/form-data">
      <?php include '../../includes/templates/formularios_propiedades.php';?>
      <input type="submit" class="boton boton-verde" value="Crear propiedad">
    </form>
    </main>

    <?php

    incluirTemplate("footer");
?>
