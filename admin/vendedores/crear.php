<?php
require"../../includes/app.php";

use App\vendedor;

estaAutenticado();

$vendedor = new vendedor ;

$errores= vendedor::getErrores();




if($_SERVER["REQUEST_METHOD"]==="POST"){
 
  //crear una nueva instancia
  $vendedor = new vendedor($_POST['vendedor']);

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
      <h1>Registrar vendedor</h1>
      <a href="/BienesRaices_POO/admin/index.php" class="boton boton-verde">Vorver</a>
    
      <?php foreach($errores as $error): ?>
   <div class="alerta error">
    <?php echo $error;?>
    
  </div>
      
      <?php endforeach;?>


      <form class="formulario" method="POST" action="/BienesRaices_POO/admin/vendedores/crear.php" >
      <?php include '../../includes/templates/formularios_vendedores.php';?>
      <input type="submit" class="boton boton-verde" value="Registrar vendedor">
    </form>
    </main>

    <?php

    incluirTemplate("footer");
?>