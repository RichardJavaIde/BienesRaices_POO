<?php
require"includes/funciones.php";
incluirTemplate("header");
?>
    <main class="contenedor seccion">
      <h1>Conoce sobre nosotros</h1>
      <div class="contenido-nosotros">
        <div class="imagen">
          <picture
            ><source srcset="build/img/nosotros.webp" type="image/webp" />
            <source srcset="build/img/nosotros.jpg" type="image/jpeg" />
            <img
              loading="lazy"
              src="build/img/nosotros.jpg"
              alt="Texto de entrada de blog"
            />
          </picture>
        </div>

        <div class="texto-nosotros">
          <blockquote>25 años de experiencia</blockquote>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint
            officiis alias repellat, facere quia harum nisi aliquam cupiditate
            aut. Odio a cupiditate aliquam earum provident nam porro illo rerum
            in. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab
            praesentium est ipsam sed accusantium velit, animi rem nemo
            perferendis et architecto ex vitae, necessitatibus non quo odio
            eius, nam nobis. Lorem ipsum dolor sit amet consectetur adipisicing
            elit. Tempora qui consequatur sequi architecto nulla, neque soluta
            praesentium voluptatum necessitatibus est in veritatis repudiandae
            voluptas eum, itaque dolorum saepe possimus autem.
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse
            suscipit atque ducimus ab iusto dolorem omnis consectetur? Et modi
            doloribus, sed reiciendis, tempore ab sunt amet eveniet rem,
            voluptates incidunt?
          </p>
        </div>
      </div>
    </main>
    <section class="contenedor seccion">
      <h1>Mas sobre nosotros</h1>
      <div class="iconos-nosotros">
        <div class="icono">
          <img
            src="build/img/icono1.svg"
            alt="Icono seguridad"
            loading="lazy"
          />
          <h3>Seguridad</h3>
          <p>
            A nesciunt voluptates obcaecati eligendi vel iusto et. Nesciunt,
            corrupti voluptas? Sequi nulla sint at consequuntur?
          </p>
        </div>
        <div class="icono">
          <img
            src="build/img/icono2.svg"
            alt="Icono seguridad"
            loading="lazy"
          />
          <h3>Precio</h3>
          <p>
            A nesciunt voluptates obcaecati eligendi vel iusto et. Nesciunt,
            corrupti voluptas? Sequi nulla sint at consequuntur?
          </p>
        </div>
        <div class="icono">
          <img
            src="build/img/icono3.svg"
            alt="Icono seguridad"
            loading="lazy"
          />
          <h3>Tiempo</h3>
          <p>
            A nesciunt voluptates obcaecati eligendi vel iusto et. Nesciunt,
            corrupti voluptas? Sequi nulla sint at consequuntur?
          </p>
        </div>
      </div>
    </section>

    <?php

    incluirTemplate("footer");
?>
