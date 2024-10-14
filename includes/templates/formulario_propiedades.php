<fieldset>
    <legend>Informacion General</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" name="propiedad[titulo]" placeholder="Titulo Propiedad" id="titulo" value="<?php echo s($propiedad-> titulo); ?>">

    <label for="precio">Precio:</label>
    <input type="number" name="propiedad[precio]" placeholder="Precio Propiedad" id="precio" value="<?php echo s($propiedad-> precio); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="propiedad[imagen]" accept="image/jpeg, image/png">

    <?php if ($propiedad -> imagen) { ?>
        <img src="/imagenes/<?php echo $propiedad -> imagen ?>" class="imagen-pequeña">
    <?php } ?>

    <label for="descripcion">Descripcion:</label>
    <textarea name="propiedad[descripcion]" id="descripcion"><?php echo s($propiedad-> descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Informacion Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input type="number" name="propiedad[habitaciones]" placeholder="Ej: 3" id="habitaciones" min="1" max="9" value="<?php echo s($propiedad -> habitaciones); ?>">

    <label for="baños">Baños:</label>
    <input type="number" name="propiedad[baños]" placeholder="Ej: 3" id="baños" min="1" max="9" value="<?php echo s($propiedad -> baños); ?>">

    <label for="estacionamientos">Estacionamiento:</label>
    <input type="number" name="propiedad[estacionamientos]" placeholder="Ej: 3" id="estacionamientos" min="1" max="9" value="<?php echo s($propiedad -> estacionamientos); ?>">
</fieldset>

<fieldset>
    <legend>Vendedores</legend>

    <label for="vendedor">Vendedor:</label>
    <select name="propiedad[vendedorId]" id="vendedor">
        <option selected value="">-- Seleccione --</option>
        <?php foreach ($vendedores as $vendedor) { ?>
            <option <?php echo $propiedad->vendedorId === $vendedor->id ? "selected" : ''; ?> value="<?php echo s($vendedor->id); ?>"><?php echo s($vendedor->nombre . ' ' . $vendedor->apellido); ?></option>
        <?php } ?>
    </select>
</fieldset>