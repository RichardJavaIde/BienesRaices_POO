<?php 
//Importar la conexion
require __DIR__ . '/../config/datebase.php';
$db= conectarDB();

//consultas
$query = "SELECT * FROM propiedades LIMIT $limite";

//obtener resultados
$resultado = mysqli_query($db,$query);


?> 
 <div class="contenedor-anuncios">
  <?php while ($propiedad = mysqli_fetch_assoc($resultado)):?>
           <div class="anuncio">
          
            <img  src="imagen/<?php echo $propiedad['imagen'];?>" alt="anuncio" />
          

          <div class="contenido-anuncio">
            <h3><?php echo $propiedad['titulo'];?></h3>
            <p>
              <?php echo $propiedad['descripcion'];?>
            </p>
            <p class="precio">$<?php echo $propiedad['precio'];?></p>
            <ul class="iconos-caracterisrticas">
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_wc.svg"
                  alt="Icono wc"
                />
                <p><?php echo $propiedad['wc'];?></p>
              </li>
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_estacionamiento.svg"
                  alt="Icono estacionamiento"
                />
                <p><?php echo $propiedad['estacionamiento'];?></p>
              </li>
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_dormitorio.svg"
                  alt="Icono dormitorio"
                />
                <p><?php echo $propiedad['habitaciones'];?></p>
              </li>
            </ul>
            <a href="anuncio.php?id=<?php echo $propiedad['id'];?>" class="boton-amarillo-block"
              >Ver propiedad
            </a>
          </div>
          <!--Contenido de anuncio -->
        </div>
        <!--Anuncio-->
        <?php endwhile;?>
      </div>
      <!--Contenedor de anuncio-->
<?php 
//cerrar la coneccion
mysqli_close($db);
?>