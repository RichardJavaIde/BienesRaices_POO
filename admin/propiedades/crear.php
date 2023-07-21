<?php
require"../../includes/app.php";

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

//debuguear($propiedad);
estaAutenticado();
 
$db = conectarDB();

//Consultar para obtener los vendedores
$consulta = "SELECT * FROM vendedores;";
$resultado = mysqli_query($db,$consulta);

$errores= Propiedad::getErrores();

$titulo = "";
$precio = "";
$descripcion = "";
$habitaciones = "";
$wc = "";
$estacionamiento = "";
$vendedores_id = "";


if($_SERVER["REQUEST_METHOD"]==="POST"){
  
  //Crea una nueva instacia
  $propiedad = new Propiedad ($_POST);

  //crear nombre unico.
$nombreImagen = md5(uniqid(rand(),true)).".jpg";

  //Setear la imagen
  //Realiza un resize a la imagen con intervention
  if($_FILES['imagen1']['tmp_name']){
     $image = Image::make($_FILES['imagen1']['tmp_name'])->fit(800,600);
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

if($retesultado){
  //echo "Datos insertados correctamente.";
  header('location: /BienesRaices_POO/admin/index.php?resultado=1');
}
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
      <fieldset>
        <legend>Informacion de la propiedad</legend>
        <label for="titulo">Titulo</label>
        <input value="<?php echo $titulo;?>" name="titulo" type="text" id="titulo" placeholder="Titulo de la propiedad" >

        <label for="precio">Precio</label>
        <input value="<?php echo $precio; ?>" name="precio" min="1" type="number" id="precio" placeholder="Precio de la propiedad" >
         
        <label for="imagen">Imagen</label>
        <input  type="file" id="imagen" accept="image/jpeg ,image/png ,image/jpg" name="imagen1">
        
        <label for="descripcion">Descripcion</label>
        <textarea  name="descripcion" id="descripcion" placeholder="Detalles" ><?php echo $descripcion; ?></textarea>
        
      </fieldset>

      <fieldset>
        <legend>Informacion de la propiedad</legend>
        <label for="habitaciones">Habitaciones</label>
        <input  value="<?php echo $habitaciones; ?>" name="habitaciones" min="1" type="number" id="habitaciones" placeholder="EJ:1" >
        
        <label for="wc">Baños</label>
        <input value="<?php echo $wc; ?>" name="wc" min="1" type="number" id="wc" placeholder="EJ:1" >

        <label for="estacionamiento">Estacionamiento</label>
        <input value="<?php echo $estacionamiento; ?>" name="estacionamiento" min="1" type="number" id="estacionamiento" placeholder="EJ:1" >

        
      </fieldset>

      <fieldset>
        <legend>Vendedor</legend>
        <select name="vendedores_id" >
          <option value="">-- Seleccionar --</option>
        <?php while($vendedor = mysqli_fetch_assoc($resultado)):?>
          
            <option <?php echo $vendedores_id === $vendedor['id']? 'selected':'';?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre']." ".$vendedor["apellido"]; ?></option>
          <?php endwhile; ?>

          </select>
      </fieldset>
      <input type="submit" class="boton boton-verde" value="Crear propiedad">
    </form>
    </main>

    <?php

    incluirTemplate("footer");
?>
