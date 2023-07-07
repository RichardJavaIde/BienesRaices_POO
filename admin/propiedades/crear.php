<?php
require"../../includes/funciones.php";
$auth= estaAutenticado();
if(!$auth){
      header('location: /bienesraices_inicio/index.php');
      
  }

require "../../includes/config/datebase.php"; 
$db = conectarDB();
//var_dump(conectarDB());

//Consultar para obtener los vendedores
$consulta = "SELECT *FROM vendedores;";
$resultado = mysqli_query($db,$consulta);

$errores=[];
$titulo = "";
$precio = "";
$descriocion = "";
$habitaciones = "";
$wc = "";
$estacionamiento = "";
$vendedorId = "";


if($_SERVER["REQUEST_METHOD"]==="POST"){


// mysqli_real_escape_string es para evitar ataques sql.
$titulo = mysqli_real_escape_string($db, $_POST['titulo']);
$precio = mysqli_real_escape_string($db, $_POST['precio']);
$descriocion = mysqli_real_escape_string($db, $_POST['descriocion']);
$habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
$wc = mysqli_real_escape_string($db, $_POST['wc']);
$estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
$vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
$creado = date('Y/m/d');

// Asignar files hacia una variable.

$imagen = $_FILES['imagen1'];

/* echo   "<pre>";
var_dump($imagen);
echo"</pre>"; */




if(!$titulo){
  $errores[]='Titulo obligatorio.';
}

if(!$precio){
  $errores[]="Precio obligatorio.";
}

if( strlen($descriocion) < 25){
  $errores[]="Descripcion obligatoria y debe de tener al menos 25 caracteres.";
}

if(!$habitaciones){
  $errores[]="habitaciones obligatoria.";
}
if(!$wc){
  $errores[]="Baños obligatoria.";
}
if(!$estacionamiento){
  $errores[]="Estacionamiento obligatoria.";
}
if(!$vendedorId){
  $errores[]="Vendedor obligatoria.";
}
if(!$imagen['name'] ){
  $errores[]="Imagen obligatoria.";
}
// el tamaño de la image que sea de 1mb
$medida = 1000 * 1000;

if($imagen['size']> $medida){
  $errores[]="Imagen my pesada.";

}


/* echo"<pre>";
var_dump($_FILES);
echo"</pre>";
exit; */
//Revisar que el array de errores este vacio
if(empty($errores)){

//subir la imagen

//crear carpeta

$carpetaImagen = '../../imagen/';
if(!is_dir($carpetaImagen)){
  mkdir($carpetaImagen);
}
//crear nombre unico.

$nombreImagen = md5(uniqid(rand(),true)).".jpg";

move_uploaded_file($imagen['tmp_name'], $carpetaImagen . $nombreImagen);


//Insertar en la base de datos

$query ="INSERT INTO bienesraices_crud.propiedades
(titulo, precio,descripcion, habitaciones, wc, estacionamiento, vendedores_id,Creado,imagen)
VALUES('$titulo', '$precio', '$descriocion', '$habitaciones', '$wc', '$estacionamiento', '$vendedorId','$creado','$nombreImagen');";

//echo $query;

$rtesultado = mysqli_query($db,$query);

if($rtesultado){
  //echo "Datos insertados correctamente.";
  header('location: /bienesraices_inicio/admin/index.php?resultado=1');
}
}

}
 
incluirTemplate("header");
?>
    <main class="contenedor seccion">
      <h1>Crear</h1>
      <a href="/bienesraices_inicio/admin/index.php" class="boton boton-verde">Vorver</a>
    
      <?php foreach($errores as $error): ?>
   <div class="alerta error">
    <?php echo $error;?>
  </div>
      
      <?php endforeach;?>


      <form class="formulario" method="POST" action="/bienesraices_inicio/admin/propiedades/crear.php" enctype="multipart/form-data">
      <fieldset>
        <legend>Informacion de la propiedad</legend>
        <label for="titulo">Titulo</label>
        <input value="<?php echo $titulo;?>" name="titulo" type="text" id="titulo" placeholder="Titulo de la propiedad" required>

        <label for="precio">Precio</label>
        <input value="<?php echo $precio; ?>" name="precio" min="1" type="number" id="precio" placeholder="Precio de la propiedad" required>
         
        <label for="imagen">Imagen</label>
        <input required type="file" id="imagen" accept="image/jpeg ,image/png ,image/jpg" name="imagen1">
        
        <label for="descriocion">Descripcion</label>
        <textarea  name="descriocion" id="descriocion" placeholder="Detalles" required><?php echo $descriocion; ?></textarea>
        
      </fieldset>

      <fieldset>
        <legend>Informacion de la propiedad</legend>
        <label for="habitaciones">Habitaciones</label>
        <input  value="<?php echo $habitaciones; ?>" name="habitaciones" min="1" type="number" id="habitaciones" placeholder="EJ:1" required>
        
        <label for="wc">Baños</label>
        <input value="<?php echo $wc; ?>" name="wc" min="1" type="number" id="wc" placeholder="EJ:1" required>

        <label for="estacionamiento">Estacionamiento</label>
        <input value="<?php echo $estacionamiento; ?>" name="estacionamiento" min="1" type="number" id="estacionamiento" placeholder="EJ:1" required>

        
      </fieldset>

      <fieldset>
        <legend>Vendedor</legend>
        <select required name="vendedor" >
          <option value="">-- Seleccionar --</option>
        <?php while($vendedor = mysqli_fetch_assoc($resultado)):?>
          
            <option <?php echo $vendedorId === $vendedor['id']? 'selected':'';?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre']." ".$vendedor["apellido"]; ?></option>
          <?php endwhile; ?>

          </select>
      </fieldset>
      <input type="submit" class="boton boton-verde" value="Crear propiedad">
    </form>
    </main>

    <?php

    incluirTemplate("footer");
?>
