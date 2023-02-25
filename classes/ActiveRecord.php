<?php

namespace App;

class ActiveRecord{
    // Conetion to Database
   protected static $db;
   protected static $columnasDb = ['id', 'titulo', 'precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedores_id'];
   protected static $tabla = '';

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
      $this->id = $args['id'] ?? NULL;
      $this->titulo = $args['titulo'] ?? '';
      $this->precio = $args['precio'] ?? '';
      $this->imagen = $args['imagen'] ?? '';
      $this->descripcion = $args['descripcion'] ?? '';
      $this->habitaciones = $args['habitaciones'] ?? '';
      $this->wc = $args['wc'] ?? '';
      $this->estacionamiento = $args['estacionamiento'] ?? '';
      $this->creado = date('Y/m/d');
      $this->vendedores_id = $args['vendedor'] ?? '1';
   }

   public function guardar(){
      if(!is_null($this->id)){
         // Actualizar el registro
         $this->actualizar();
      } else {
         // Crear un nuevo registro
         $this->crear();
      }
   }

   public function crear(){
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
   
   if($resultado) {
      // REDIRECCIONAR A USUARIO
      header('Location: /admin/index.php?resultado=1');
   }
}

   public function actualizar() {
      //Sanitize Dates
      $atributos = $this->sanitizarAtributos();

      $valores = [];
      foreach($atributos as $key => $value) {
         $valores[] = "{$key} ='{$value}'";
      }

      $query = " UPDATE propiedades SET ";
      $query .= join(', ', $valores);
      $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
      $query .=  " LIMIT 1 " ;

      $resultado = self::$db->query($query);
      
      if ($resultado) {
         // REDIRECCIONAR A USUARIO
         header('Location: /admin/index.php?resultado=2');
     }
   }

   // Eliminar un registro
   public function Eliminar(){
      // Eliminar la propiedad
      $query = "DELETE FROM propiedades WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
      $resultado = self::$db->query($query);

      // Redireccionar
      if($resultado){
         $this->borrarImagen();
         header('location: /admin/index.php?resultado=3');
     }
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
      // Elimina imagen previa
      if(!is_null($this->id)){
        $this->borrarImagen();
      }
      // Asignar al atributo de imagen el nombre de imagen
      if($imagen){
         $this->imagen = $imagen;
      }
   }

   // Elimina el archivo
   public function borrarImagen(){
       //Comprobar si existe la imagen
       $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
       if($existeArchivo){
          unlink(CARPETA_IMAGENES . $this->imagen);
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

   // Lista todos los registros
   public static function all(){
      $query = "SELECT * FROM " . self::$tabla;
     

      $resultado = self::consultarSQL($query);

      return $resultado;
   }

   // Busca una registros por su ID
   public static function find($id){
      $query = "SELECT * FROM propiedades WHERE id = ${id}";

      $resultado = self::consultarSQL($query);
      return array_shift($resultado);

   }

   public static function consultarSQL($query){
      // Consultar la base de datos
      $resultado = self::$db->query($query);

      // Iterar los resultados
      $array = [];
      while($registro = $resultado->fetch_assoc()) {
         $array[] = self::crearObjeto($registro);
      }

      // Liberar la memoria
      $resultado->free();

      // Retornar los resultados
      return $array;
   }

   protected static function crearObjeto($registro){
      $objeto = new self;

      foreach($registro as $key => $value){
         if(property_exists($objeto, $key)){
            $objeto->$key = $value;
         }
      }
      return $objeto;
   }

   // Sincroniza el objeto en memoria con los cambios por el usuario
   public function sincronizar($args = []){
      foreach($args as $key => $value) {
         if(property_exists($this, $key) && !is_null($value)){
               $this->$key = $value;
         }
      }
   }
}