<?php
namespace App;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;
class Propiedad extends ActiveRecord{
   protected static $tabla = 'propiedades';
   protected static $columnasDb = ['id', 'titulo', 'precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedores_id'];

   public $id;
   public $titulo;
   public $precio;
   public $imagen;
   public $descripcion;
   public $habitaciones;
   public $wc;
   public $estacionamiento;
   public $creado;
   public $vendedores_id;

   public function __construct($args = [])
   {
      $this->id = $args['id'] ?? NULL;
      $this->titulo = $args['titulo'] ?? '';
      $this->precio = $args['precio'] ?? '';
      $this->imagen = $args['imagen'] ?? '';
      $this->descripcion = $args['descripcion'] ?? '';
      $this->habitaciones = $args['habitaciones'] ?? '';
      $this->wc = $args['wc'] ?? '';
      $this->estacionamiento = $args['estacionamiento'] ?? '';
      $this->creado = date('Y/m/d');
      $this->vendedores_id = $args['vendedorId'] ?? '';
   }

   public function validar(){
      // REVISAR QUE CADA CAMPO TENGA SUS VALORES ASIGNADOS
         if(!$this->titulo) {
            self::$errores[] = "Debes insertar un titulo";
      };
   
      if(!$this->precio) {
         self::$errores[] = "Debes insertar un precio";
      };
   
      if(!$this->descripcion || strlen($this->descripcion) < 50) {
         self::$errores[] = "La descripcion es obligatorio, y debe tener al menos 50 caracteres";
      };
   
      if(!$this->habitaciones) {
         self::$errores[] = "Debes insertar habitaciones";
      };
   
      if(!$this->wc) {
         self::$errores[] = "Debes insertar los wc";
      };
   
      if(!$this->estacionamiento) {
         self::$errores[] = "Debes insertar los estacionamientos";
      };
   
      if(!$this->vendedores_id) {
         self::$errores[] = "Debes elegir un vendedor";
      };
   
      if(!$this->imagen){
            self::$errores[] = "La imagen es requerida";
      };
   
         return self::$errores;
      }
}
