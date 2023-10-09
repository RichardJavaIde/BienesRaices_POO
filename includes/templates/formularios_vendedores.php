<fieldset>
        <legend>Informacion general</legend>
        <label for="nombre">Nombre</label>
        <input value="<?php echo s($vendedor->nombre);?>" name="vendedor[nombre]" type="text" id="nombre" placeholder="Nombre del vendedor" >

        <label for="apellido">Apellido</label>
        <input value="<?php echo s($vendedor->apellido);?>" name="vendedor[apellido]" type="text" id="apellido" placeholder="apellido del vendedor" >
        

    </fieldset>        

    <fieldset>
        <legend>Informacion extra</legend>
        
        <label for="telefono">Telefono</label>
        <input value="<?php echo s($vendedor->telefono);?>" name="vendedor[telefono]" type="text" id="telefono" placeholder="Telefono del vendedor" >

    
    </fieldset>   