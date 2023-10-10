<?php
require"../includes/app.php";
estaAutenticado();
 
use App\Propiedad;
use App\vendedor;

// Implementar un metodo para obtener todas las propi
$propiedades = Propiedad::all();
$vendedores = vendedor::all();

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
    $tipoContenido=$_POST['tipo'];
    if(validarTipoContenido($tipoContenido)){

      if($tipoContenido == 'vendedor'){
        $vendedor = vendedor::find($id);
        $vendedor->eliminar();
      
     }else if($tipoContenido == 'propiedad' ){
         $propiedad = Propiedad::find($id);
         $propiedad->eliminar();
      }

    }

    }
      
     
      
         
  }

  
//Incluir template.

incluirTemplate("header");
?>
    <main class="contenedor seccion">
      <h1>Administrador de bienes raices</h1>

      <?php
      $mensaje = mostrarNotificacion(intval( $resultado ));

      if($mensaje){?>
            <p class="alerta exito"><?php echo s($mensaje)?></p>
    <?php  }?>

     

      <a href="propiedades/crear.php" class="boton boton-verde">Crear propidad</a>
      <a href="vendedores/crear.php" class="boton boton-amarillo">Nuevo/a vendedor</a>
            <h2>Propiedades</h2>
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
             
              
              <a href="propiedades/actualizar.php?id=<?php echo $propiedad->id;?>" class="boton-amarillo-block">Actualizar</a>
             <form method="POST"  class="w-100">
                <input type="hidden" name="id" value="<?php echo $propiedad->id;?>">
                <input type="hidden" name="tipo" value="propiedad">
                <input type="submit" class="boton-rojo-block" value="Eliminar">
              </form>
            </td>
           </tr>
           <?php endforeach;?>
        </tbody>

      </table>
            <h2>Vendedores</h2>

            <table class="propiedades">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Telefono</th>
             <th>Acciones</th>
          </tr>
        </thead>

        <tbody>
        <?php foreach($vendedores as $vendedor):?>
           <tr>
            <td><?php echo $vendedor ->id;?> </td>
            <td><?php echo $vendedor -> nombre ." " . $vendedor -> apellido;?></td>
            <td><?php echo $vendedor -> telefono;?></td>
            <td>
             
              
              <a href="vendedores/actualizar.php?id=<?php echo $vendedor->id;?>" class="boton-amarillo-block">Actualizar</a>
             <form method="POST"  class="w-100">
                <input type="hidden" name="id" value="<?php echo $vendedor->id;?>">
                <input type="hidden" name="tipo" value="vendedor">
                <input type="submit" class="boton-rojo-block" value="Eliminar">
              </form>
            </td>
           </tr>
           <?php endforeach;?>
        </tbody>

      </table>
    </main>

    <?php

     
    incluirTemplate("footer");
?>
