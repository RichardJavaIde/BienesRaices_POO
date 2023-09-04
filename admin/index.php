<?php
require"../includes/app.php";
estaAutenticado();
 
use App\Propiedad;

// Implementar un metodo para obtener todas las propi
$propiedades = Propiedad::all();

/* //Escribir el Query.
$query ="SELECT id, titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, Creado, vendedores_id
FROM propiedades;";

//Consultar la db
$resultadoConsulta = mysqli_query($db,$query); */

//Mesage condicional.
$resultado = $_GET['resultado'] ?? null;

if($_SERVER['REQUEST_METHOD']==='POST'){

  $id = $_POST['id']; //Ese post no va a existir hasta que se cree este REQUEST_METHOD.
  $id = filter_var($id,FILTER_VALIDATE_INT);
  //var_dump($id);

  if($id){
    //Elimina la imagen que esta guardada
    $query = "SELECT imagen FROM propiedades where id =$id";  
    $resultado = mysqli_query($db,$query);
    $propiedad = mysqli_fetch_assoc($resultado);
    
    unlink('../imagen/'.$propiedad['imagen']);
   
    //Elimina el registro de la base de datos
    $query = "DELETE FROM propiedades WHERE id = $id";
    $resultado = mysqli_query($db,$query);
 

    if($resultado){
      header('location: /BienesRaices_POO/admin/index.php?resultado=3');
    
    }
  }

  }
//Incluir template.

incluirTemplate("header");
?>
    <main class="contenedor seccion">
      <h1>Administrador de bienes raices</h1>

      <?php if(intval( $resultado ) === 1): ?>
          <p class="alerta exito">Anuncio creado correctamente.</p>
        <?php elseif(intval( $resultado ) === 2): ?>
          <p class="alerta exito">Anuncio actualizado correctamente.</p>
          <?php elseif(intval( $resultado ) === 3): ?>
          <p class="alerta exito">Anuncio eliminado correctamente.</p>
          <?php endif;?>

      <a href="propiedades/crear.php" class="boton boton-verde">Crear propidad</a>

      <table class="propiedades">
        <thead>
          <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody>
        <?php foreach($propiedades as $propiedad ):?>
           <tr>
            <td><?php echo $propiedad ->id;?> </td>
            <td><?php echo $propiedad -> titulo;?></td>
            <td><img src="../imagen/<?php echo $propiedad -> imagen;?>" class="imagen-tabla" alt="Imagen del anuncio"> </td>
            <td><?php echo $propiedad -> precio;?></td>
            <td>
             
              
              <a href="propiedades/actualizar.php?id=<?php echo $propiedad ->id;?>" class="boton-amarillo-block">Actualizar</a>
             <form method="POST"  class="w-100">
                <input type="hidden" name="id" value="<?php echo $propiedad -> id;?>">
                <input type="submit" class="boton-rojo-block" value="Eliminar">
              </form>
            </td>
           </tr>
           <?php endforeach;?>
        </tbody>

      </table>

    </main>

    <?php

      mysqli_close($db);
    incluirTemplate("footer");
?>
