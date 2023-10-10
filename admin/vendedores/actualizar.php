<?php
require"../../includes/app.php";

use App\vendedor;

estaAutenticado();
//validar que sea un ID valido
$id = $_GET['id'];
$id = filter_var($id,FILTER_VALIDATE_INT);

if(!$id){
  header('location: /BienesRaices_POO/admin/index.php');
}

//Obtener los datos de la propiedad en espesifico.

$vendedor = vendedor::find($id);

$errores= vendedor::getErrores();

if($_SERVER["REQUEST_METHOD"]==="POST"){

  //Asignar los atributos
  $args= $_POST['vendedor'];
  $vendedor->sincronizar($args);

//Validar que no haya campos vacios
  $errores= $vendedor->validar();

  //No hay errores
  if(empty($errores)){
    $vendedor->guardar();
  }
}

incluirTemplate("header");

?>

 <main class="contenedor seccion">
      <h1>Actualizar vendedor/a</h1>
      <a href="/BienesRaices_POO/admin/index.php" class="boton boton-verde">Vorver</a>
    
      <?php foreach($errores as $error): ?>
   <div class="alerta error">
    <?php echo $error;?>
    
  </div>
      
      <?php endforeach;?>


      <form class="formulario" method="POST" >
      <?php include '../../includes/templates/formularios_vendedores.php';?>
      <input type="submit" class="boton boton-verde" value="Guardar cambios">
    </form>
    </main>

    <?php

    incluirTemplate("footer");
?>
