<main class="contenedor seccion contenido-centrado">
    <h1>Contacto</h1>

    <?php if ($mensaje) { ?>
        <p class="alerta exito"><?php echo $mensaje; ?></p>
    <?php } ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
    </picture>

    <h2>Llena el formulario de Contacto</h2>

    <form class="formulario" method="post" action="/contacto">
        <fieldset>
            <legend>Informacion Personal</legend>

            <label for="nombre">Nombre completo:</label>
            <input type="text" placeholder="Tu Nombre y Apellido" id="nombre" name="contacto[nombre]" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
        </fieldset>
        <fieldset>
            <legend>Información sobre la Propiedad</legend>

            <label for="opciones">Compra o Vende:</label>
            <select id="opciones" name="contacto[tipo]" required>
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto:</label>
            <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[precio]" required>
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>Como desea ser contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" value="Telefono" id="contactar-telefono" name="contacto[contacto]" required>

                <label for="contactar-email">Email</label>
                <input type="radio" value="Email" id="contactar-email" name="contacto[contacto]" required>
            </div>

            <div id="contacto"></div>
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>