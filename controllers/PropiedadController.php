<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

class PropiedadController {
    public static function index(Router $router) {

        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();

        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }
    public static function crear(Router $router) {

        $propiedad = new Propiedad();
        $vendedores = Vendedor::all();
        //Arreglo con mensaje de errores
        $errores = Propiedad::getErorres();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $propiedad = new Propiedad($_POST['propiedad']);
    
            //Subida de archivos
    
            //Crear carpeta
            $carpetaImagenes = '../../imagenes/';
    
            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }
    
            //Generar nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    
            //Realizar un resize a la imagen con intervention
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $manager = new Image(Driver::class);
                $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800,600);  
                $propiedad->setImagen($nombreImagen);
            }
    
            $errores = $propiedad->validar();
    
            
            if(empty($errores)) {
    
                // Crear Carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES);
                }
    
                // Guardar la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
    
                //Guardar en la base de datos
                $propiedad->guardar();
            }
            }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {

        $id = validarORedireccionar('/admin');

        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErorres();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Asignar los atributos
            $args = $_POST['propiedad'];
    
            $propiedad -> sincronizar($args);
    
            //Validar
            $errores = $propiedad->validar();
    
            //Generar nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    
            //Realizar un resize a la imagen con intervention
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $manager = new Image(Driver::class);
                $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800,600);
                $propiedad->setImagen($nombreImagen);
            } 
    
            if(empty($errores)) {
                if($_FILES['propiedad']['tmp_name']['imagen']){
                //Almacenar la imagen
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $resultado = $propiedad -> guardar();
            }
            }

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
}