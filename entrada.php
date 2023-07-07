<?php
require"includes/funciones.php";
incluirTemplate("header");
?>
    <main class="contenedor seccion contenido-centrado">
      <h1>Guia para la decoracion de tu hogar</h1>

      <picture
        ><source srcset="build/img/destacada2.webp" type="image/webp" />
        <source srcset="build/img/destacada2.jpg" type="image/jpeg" />
        <img
          loading="lazy"
          src="build/img/destacada2.jpg"
          alt="Entrada de la propiedad"
        />
      </picture>
      <p class="informacion-meta">
        Escrito el: <span>20/10/2021 </span>por: <span>Admin</span>
      </p>

      <div class="resumen-propiedad">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint officiis
          alias repellat, facere quia harum nisi aliquam cupiditate aut. Odio a
          cupiditate aliquam earum provident nam porro illo rerum in. Lorem
          ipsum dolor sit amet consectetur adipisicing elit. Ab praesentium est
          ipsam sed accusantium velit, animi rem nemo perferendis et architecto
          ex vitae, necessitatibus non quo odio eius, nam nobis. Lorem ipsum
          dolor sit amet consectetur adipisicing elit. Tempora qui consequatur
          sequi architecto nulla, neque soluta praesentium voluptatum
          necessitatibus est in veritatis repudiandae voluptas eum, itaque
          dolorum saepe possimus autem.
        </p>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse suscipit
          atque ducimus ab iusto dolorem omnis consectetur? Et modi doloribus,
          sed reiciendis, tempore ab sunt amet eveniet rem, voluptates incidunt?
        </p>
      </div>
    </main>

    <?php

    incluirTemplate("footer");
?>
