<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplates (string $nombre, bool $inicio = false) {
    include TEMPLATES_URL . "/{$nombre}.php";
}

function estaAutenticado() {
    session_start();

    if(!$_SESSION['login']) {
        header('location: /santiagobienesraices/index.php');
    }
}

function debuguear($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

//Sanitizar HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function validarTipoContenido($tipo) {
    $tipos = ['vendedor', 'propiedad'];
    
    return in_array($tipo, $tipos);
}

//Mostrar los mensajes
function mostrarNotificacion($codigo) {
    $mensaje = '';

    switch($codigo) {
        case 1 :
            $mensaje = 'Creado correctamente';
            break;
        case 2 :
            $mensaje = 'Actualizado correctamente';
            break;
        case 3 :
            $mensaje = 'Eliminado correctamente';
            break;
        case 4 :
            $mensaje = 'Mensaje enviado correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarORedireccionar($url) {
    //Validar la URL por ID valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if (!$id) {
        header ("location: {$url}");
    }

    return $id;
}

function truncate(string $texto, int $cantidad) : string
{
    if(strlen($texto) >= $cantidad) {
        return substr($texto, 0, $cantidad) . "...";
    } else {
        return $texto;
    }
}

?>