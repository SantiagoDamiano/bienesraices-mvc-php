<main class="contenedor seccion">

    <h1>Administrador de Bienes Raices</h1>
        
    <?php
    if($resultado) {

    $mensaje = mostrarNotificacion(intval($resultado));
    if($mensaje) { ?>
    <p class="alerta exito"><?php echo s($mensaje) ?> </p>
    <?php }
    } ?>

    <a href="/propiedades/crear" class="boton boton-verde">Nueva Propiedad</a>
    <a href="/vendedores/crear" class="boton boton-amarillo">Nuevo/a Vendedor</a>

    <h2>Propiedades</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($propiedades as $propiedad) : ?>
            <tr>
                <td><?php echo $propiedad-> id; ?></td>
                <td><?php echo $propiedad-> titulo; ?></td>
                <td class="imagen-tabla"><img src="../imagenes/<?php echo $propiedad-> imagen; ?>"></td>
                <td>$<?php echo $propiedad-> precio ?></td>
                <td>
                    <form method="POST" action="/propiedades/eliminar">
                        <input type="hidden" name="id" value="<?php echo $propiedad-> id; ?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input type="submit" value="Eliminar" class="boton-rojo-block">
                    </form>
                    <a class="boton-amarillo-block" href="propiedades/actualizar?id= <?php echo $propiedad -> id;?>">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($vendedores as $vendedor) : ?>
                <tr>
                    <td><?php echo $vendedor-> id; ?></td>
                    <td><?php echo $vendedor-> nombre . " " . $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor-> telefono ?></td>
                    <td>
                        <form method="POST" action="/vendedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $vendedor-> id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>
                        <a class="boton-amarillo-block" href="vendedores/actualizar?id= <?php echo $vendedor -> id;?>">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</main>