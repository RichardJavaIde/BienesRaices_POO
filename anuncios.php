<?php
require"includes/funciones.php";
incluirTemplate("header");
?>
    <main class="contenedor seccion">
     <?php 
      //Esta bariable se pasa en el include
      $limite = 10; // para que traega solo tres reguistro.
      include'includes/templates/anuncios.php';
      ?>
      </div>
      <!--Contenedor de anuncio-->
    </main>

    <?php

    incluirTemplate("footer");
?>
