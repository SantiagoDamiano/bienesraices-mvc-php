<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad) { ?>
    <div class="anuncios">
            <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio">

        <div class="contenido-anuncio">
            <h3><?php echo $propiedad->titulo; ?></h3>
            <p>
            <?php
            $descripcion = $propiedad->descripcion;
            if (strlen($descripcion) > 100) {
                echo substr($descripcion, 0, 100) . "...";
                echo '<a href="/propiedad?id=' . $propiedad->id . '">Leer más</a>';
            } else {
                echo $descripcion;
            }
            ?>
        </p>
            <p class="precio"><?php echo $propiedad->precio; ?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono wc">
                    <p><?php echo $propiedad->baños; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono dormitorio">
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                    <p><?php echo $propiedad->estacionamientos; ?></p>
                </li>
            </ul>

            <a href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Ver Propiedad</a>
        </div> <!--contenido-anuncio-->
    </div> <!--anuncio-->
    <?php } ?>
</div> <!--contenido-->
