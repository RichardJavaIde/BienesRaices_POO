<?php

use App\Propiedad;
use App\vendedor;
use Intervention\Image\ImageManagerStatic as Image;

require"../../includes/app.php";
estaAutenticado();

//Validar la URL por ID Valido.
$id = $_GET['id'];
$id = filter_var($id,FILTER_VALIDATE_INT);

if(!$id){
  header('location: /BienesRaices_POO/admin/index.php');
}

//Obtener los datos de la propiedad en espesifico.

$propiedad = Propiedad::find($id);


//Consultar para obtener los vendedores
$vendedores = vendedor::all();

$errores= Propiedad::getErrores();

if($_SERVER["REQUEST_METHOD"]==="POST"){
//Asignar los atributos
$args=[];
$args= $_POST['propiedad'];

$propiedad->sincronizar($args);

//validacion
$errores = $propiedad->validar();

//Subida de archivo
  //crear nombre unico.
$nombreImagen = md5(uniqid(rand(),true)).".jpg";

  //Setear la imagen
  //Realiza un resize a la imagen con intervention
  if($_FILES['propiedad']['tmp_name']['imagen']){
     $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
     $propiedad->setImagen($nombreImagen);
  }

//Revisar que el array de errores este vacio
if(empty($errores)){
 //Almacenar la imagen
     $image->save(CARPETA_IMAGENES . $nombreImagen);



//Insertar en la base de datos
$propiedad->guardar();

  }

}
 

incluirTemplate("header");
?>
    <main class="contenedor seccion">
      <h1>Actualizar</h1>
      <a href="/BienesRaices_POO/admin/index.php" class="boton boton-verde">Vorver</a>
    
      <?php foreach($errores as $error): ?>
   <div class="alerta error">
    <?php echo $error;?>
  </div>
      
      <?php endforeach;?>


      <form class="formulario" method="POST" enctype="multipart/form-data">
      
        <?php include '../../includes/templates/formularios_propiedades.php';?>

      <input type="submit" class="boton boton-verde" value="Actualizar propiedad">
    </form>
    </main>

    <?php

    incluirTemplate("footer");
?>
