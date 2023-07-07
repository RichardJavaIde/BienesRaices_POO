<?php
require"includes/funciones.php";
$inicio=true; 

incluirTemplate("header",$inicio);


?>
    <main class="contenedor seccion">
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
    </main>

    <section class="seccoin contenedor">
      <h2>Casas y depas en venta</h2>

      <?php 
      //Esta bariable se pasa en el include
      $limite = 3; // para que traega solo tres reguistro.
      include'includes/templates/anuncios.php';
      ?>
     
      <div class="ver-todas aliniar-derecha">
        <a href="anuncios.php" class="boton-verde"> Ver todas</a>
      </div>
    </section>
    <section class="imagen-contacto">
      <h2>Encuentra la casa de tus sueños</h2>
      <p>
        Llena el formulario de contacto y un asesor se pondra en contacto
        contigo a la brevedad
      </p>
      <a href="contacto.php" class="boton-amarillo">Contactanos</a>
    </section>
    <div class="contenedor seccion seccion-inferior">
      <section class="blog">
        <h3>Nuestro blog</h3>
        <article class="entrada-blog">
          <div class="imagen">
            <picture>
              <source srcset="build/img/blog1.webp" type="image/webp" />
              <source srcset="build/img/blog1.jpg" type="image/jpeg" />
              <img
                loading="lazy"
                src="build/img/blog1.jpg"
                alt="Texto de entrada de blog"
              />
            </picture>
          </div>
          <div class="texto-entrada">
            <a href="entrada.html">
              <h4>Terraza en el techo de tu casa</h4>
              <p class="informacion-meta">
                Escrito el: <span>20/10/2021 </span>por: <span>Admin</span>
              </p>
              <p>
                Consejos para constuir una terraza en el techo de tu casa con
                los mejores materiales y ahorrando dinera
              </p>
            </a>
          </div>
        </article>

        <article class="entrada-blog">
          <div class="imagen">
            <picture>
              <source srcset="build/img/blog2.webp" type="image/webp" />
              <source srcset="build/img/blog2.jpg" type="image/jpeg" />
              <img
                loading="lazy"
                src="build/img/blog2.jpg"
                alt="Texto de entrada de blog"
              />
            </picture>
          </div>
          <div class="texto-entrada">
            <a href="entrada.html">
              <h4>Guia para la decoracion de tu hogar</h4>
              <p class="informacion-meta">
                Escrito el: <span>20/10/2021 </span>por: <span>Admin</span>
              </p>
              <p>
                Maximiza el espacio en tu hogar con esta guia, aprende a
                combinar mueble y colores para darle vida a tu espacio
              </p>
            </a>
          </div>
        </article>
      </section>
      <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
          <blockquote>
            El personal se comporto de una excelente forma, muy buena atencion y
            la casa que me ofrecieron cumplio con todas mios expectativas.
          </blockquote>
          <p>-Abel Duran</p>
        </div>
      </section>
    </div>
  <?php

    include"./includes/templates/footer.php";
?>
