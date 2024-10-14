<fieldset>
    <legend>Informacion General</legend>

    <label for="nombre">nombre:</label>
    <input type="text" name="vendedor[nombre]" placeholder="Nombre Vendedor" id="nombre" value="<?php echo s($vendedor->nombre); ?>">

    <label for="apellido">apellido:</label>
    <input type="text" name="vendedor[apellido]" placeholder="Apellido Vendedor" id="apellido" value="<?php echo s($vendedor->apellido); ?>">

    <label for="telefono">Telefono:</label>
    <input type="text" name="vendedor[telefono]" placeholder="Telefono Vendedor" id="telefono" value="<?php echo s($vendedor->telefono); ?>">       

</fieldset>