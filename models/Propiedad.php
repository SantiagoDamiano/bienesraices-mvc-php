<?php

namespace Model;

class Propiedad extends ActiveRecord {

    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'baños', 'estacionamientos', 'creado', 'vendedorId'];


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $baños;
    public $estacionamientos;
    public $creado;
    public $vendedorId;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null ;
        $this->titulo = $args['titulo'] ?? '' ;
        $this->precio = $args['precio'] ?? '' ;
        $this->imagen = $args['imagen'] ?? '' ;
        $this->descripcion = $args['descripcion'] ?? '' ;
        $this->habitaciones = $args['habitaciones'] ?? '' ;
        $this->baños = $args['baños'] ?? '' ;
        $this->estacionamientos = $args['estacionamientos'] ?? '' ;
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '' ;
    }

    public function validar() {

        if (!$this->titulo) {
            self::$errores[] = 'El titulo es obligatorio';
        }
        if (!$this->precio) {
            self::$errores[] = 'El precio es obligatorio';
        }
        if (!$this->imagen) {
            self::$errores[] = 'La imagen es obligatoria';
        }
        if (strlen ($this->descripcion) < 50) {
            self::$errores[] = 'La descripcion es obligatoria y debe tener al menos 50 caracteres';
        }
        if (!$this->habitaciones) {
            self::$errores[] = 'Debes agregar habitaciones';
        }
        if (!$this->baños) {
            self::$errores[] = 'Debes agregar baños';
        }
        if (!$this->estacionamientos) {
            self::$errores[] = 'Debes agregar estacionamientos';
        }
        if (!$this->vendedorId) {
            self::$errores[] = 'Debes agregar un vendedor';
        }
        
        return self::$errores;
    }
}