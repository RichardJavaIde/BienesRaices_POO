<?php
require"../../includes/app.php";

use App\vendedor;

estaAutenticado();

$vendedor = new vendedor ;

$errores= vendedor::getErrores();




if($_SERVER["REQUEST_METHOD"]==="POST"){

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


      <form class="formulario" method="POST" action="/BienesRaices_POO/admin/vendedores/actualizar.php" >
      <?php include '../../includes/templates/formularios_vendedores.php';?>
      <input type="submit" class="boton boton-verde" value="Guardar cambios">
    </form>
    </main>

    <?php

    incluirTemplate("footer");
?>
