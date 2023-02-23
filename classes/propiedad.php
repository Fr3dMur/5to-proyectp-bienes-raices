<?php

namespace App;

class Propiedad {
// Conetion to Database
   protected static $db;
   protected static $columnasDb = ['id', 'titulo', 'precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedores_id'];

// Errors
   protected static $errores = [];

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

//Define conetion to database
   public static function setDB($database){
      self::$db = $database;
   }

   public function __construct($args = [])
   {
      $this->id = $args['id'] ?? '';
      $this->titulo = $args['titulo'] ?? '';
      $this->precio = $args['precio'] ?? '';
      $this->imagen = $args['imagen'] ?? '';
      $this->descripcion = $args['descripcion'] ?? '';
      $this->habitaciones = $args['habitaciones'] ?? '';
      $this->wc = $args['wc'] ?? '';
      $this->estacionamiento = $args['estacionamiento'] ?? '';
      $this->creado = date('Y/m/d');
      $this->vendedores_id = $args['vendedor'] ?? '';
   }

   public function guardar(){
//Sanitize Dates
      $atributos = $this->sanitizarAtributos();
   
//Insert to database
   $query = " INSERT INTO propiedades (";
   $query .= join(', ', array_keys($atributos));
   $query .= ") VALUES ('";
   $query .=  join("', '", array_values($atributos));
   $query .= "') ";

   // debuggear($query);
//Get result from Query
   $resultado = self::$db->query($query);
   return $resultado;
}

   public function atributos(){
      $atributos = [];
      foreach(self::$columnasDb as $columna){
         if($columna=='id') continue;
         $atributos[$columna] = $this->$columna;
      };
      return $atributos;
   }

   public function sanitizarAtributos(){
      $atributos = $this->atributos();
      $sanitizado = [];

      foreach($atributos as $key => $value ){
         $sanitizado[$key] = self::$db->escape_string($value);
      }
      return $sanitizado;
   }

   // Subida de archivos
   public function setImagen($imagen){
      // Asignar al atributo de imagen el nombre de imagen
      if($imagen){
         $this->imagen = $imagen;
      }
   }

// Validation
   public static function getErrores(){
      return self::$errores;
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
};
