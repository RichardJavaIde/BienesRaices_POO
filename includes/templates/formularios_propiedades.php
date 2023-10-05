<fieldset>
        <legend>Informacion de la propiedad</legend>
        <label for="titulo">Titulo</label>
        <input value="<?php echo s($propiedad->titulo);?>" name="propiedad[titulo]" type="text" id="titulo" placeholder="Titulo de la propiedad" >

        <label for="precio">Precio</label>
        <input value="<?php echo s($propiedad->precio); ?>" name="propiedad[precio]" min="1" type="number" id="precio" placeholder="Precio de la propiedad" >
         
        <label for="imagen">Imagen</label>
        <input  type="file" id="imagen" accept="image/jpeg ,image/png ,image/jpg" name="propiedad[imagen]">
      
        <?php if($propiedad->imagen){?>
        <img class="imagen-small" src="../../imagen/<?php echo $propiedad->imagen; ?>" alt="Imagen de la propiedad.">

        <?php }       ?>
        <label for="descripcion">Descripcion</label>
        <textarea  name="propiedad[descripcion]" id="descripcion" placeholder="Detalles" ><?php echo s($propiedad->descripcion); ?></textarea>
        
      </fieldset>

      <fieldset>
        <legend>Informacion de la propiedad</legend>
        <label for="habitaciones">Habitaciones</label>
        <input  value="<?php echo s($propiedad->habitaciones); ?>" name="propiedad[habitaciones]" min="1" type="number" id="habitaciones" placeholder="EJ:1" >
        
        <label for="wc">Baños</label>
        <input value="<?php echo s($propiedad->wc); ?>" name="propiedad[wc]" min="1" type="number" id="wc" placeholder="EJ:1" >

        <label for="estacionamiento">Estacionamiento</label>
        <input value="<?php echo s($propiedad->estacionamiento); ?>" name="propiedad[estacionamiento]" min="1" type="number" id="estacionamiento" placeholder="EJ:1" >

        
      </fieldset>

      <fieldset>
        <legend>Vendedores</legend>
        <label for="vendedor">Vendedor</label>
        <select name="propiedad[vendedores_id]" id="vendedor">
          <option value="">-- Seleccionar --</option>
        <?php foreach($vendedores as $vendedor) {?>
            <option 
            <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : '';?>
            
            value="<?php echo s($vendedor->id);?>"><?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?></option>
          <?php } ?>

          </select>
      </fieldset>