<?php

if(!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/santiagobienesraices/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header ">
            <div class="barra">
                <a href="/santiagobienesraices/index.php">
                    <img src="/santiagobienesraices/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/santiagobienesraices/build/img/barras.svg" alt="icono barras">
                </div>
                <div class="derecha">
                    <img class="dark-mode-boton" src="/santiagobienesraices/build/img/dark-mode.svg" alt="icono dark">
                    <nav class="navegacion">
                        <a href="/santiagobienesraices/nosotros.php">Nosotros</a>
                        <a href="/santiagobienesraices/anuncios.php">Anuncios</a>
                        <a href="/santiagobienesraices/blog.php">Blog</a>
                        <a href="/santiagobienesraices/contacto.php">Contacto</a>
                        <?php if(!$auth): ?>
                            <a href="/santiagobienesraices/login.php">Login</a>
                        <?php endif; ?>
                        
                        <?php if($auth): ?>
                            <a href="/santiagobienesraices/admin/index.php">Administrar</a>
                            <a href="/santiagobienesraices/cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif; ?>   
                    </nav>
                </div>

            </div> <!--Barra-->
            <?php if($inicio) { ?>
            <h1>Venta de casas y departamentos exclusivos de lujo</h1>
            <?php }; ?>
        </div>
    </header>