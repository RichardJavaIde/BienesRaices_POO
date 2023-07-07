<?php
require"includes/funciones.php";
incluirTemplate("header");
?>
    <main class="contenedor seccion">
      <h1>Contacto</h1>
      <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp" />
        <source srcset="build/img/destacada3.jpg" type="image/jpeg" />
        <img
          loading="lazy"
          src="build/img/destacada3.jpg"
          alt="Imagen contacto"
        />
      </picture>
      <h1>Llena el formulario de contacto</h1>
      <form class="formulario">
        <fieldset>
          <legend>Informacion Personal</legend>
          <label for="nombre">Nombre</label>
          <input type="text" placeholder="Tu nombre" id="nombre" />

          <label for="email">E-mail</label>
          <input type="email" placeholder="Tu email" id="emal" />

          <label for="telefono">Telefono</label>
          <input type="tel" placeholder="Tu telefono" id="telefono" />

          <label for="mensaje">Mensaje:</label>
          <textarea placeholder="Tu mensaje" id="mensaje"></textarea>
        </fieldset>
        <fieldset>
          <legend>Informacion sobre la propiedad</legend>

          <label for="opciones">Vende o compre</label>
          <select id="opciones">
            <option value="" disabled selected>-- seleccione --</option>
            <option value="Compra">Compra</option>
            <option value="Vende">Vende</option>
          </select>
          <label for="presupuesto">Precio o presupuesto</label>
          <input type="number" placeholder="Tu presupuesto" id="presupuesto" />
        </fieldset>
        <fieldset>
          <legend>Informacion sobre la propiedad</legend>
          <p>Como desea ser contactaddo</p>

          <div class="forma-contacto">
            <label for="contactar-telefono">Telefono</label>
            <input
              type="radio"
              name="contacto"
              value="telefono"
              id="contactar-telefono"
            />

            <label for="contactar-email">Email</label>
            <input
              type="radio"
              name="contacto"
              value="email"
              id="contactar-email"
            />
          </div>
          <p>Si eligio telefono, eliga la fecha y la hora</p>
          <label for="fecha">Fecha</label>
          <input type="date" id="fecha" />

          <label for="hora">Hora</label>
          <input type="time" id="hora" min="09:00" max="18:00" />
        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde" />
      </form>
    </main>

    <?php

    incluirTemplate("footer");
?>
