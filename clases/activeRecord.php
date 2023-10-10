<?php
namespace App;

class activeRecord{
     //variable de la base de datos.     
   protected static $db;
   protected static $columnasDB = [];

   protected static $tabla = '';

    //Errores
    protected static $errores = [];

    

     
 public static function setDB($database){
      self::$db= $database;

     }


     public function guardar(){
      if(!is_null($this->id)){

         $this->actulizar();
      }else{
         $this->crear();
      }
     }
      // Eliminar registro
     public function eliminar(){
      
      $query= "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) ." LIMIT 1";
      
      $resultado = self::$db->query($query);

      if($resultado){
         $this->borrarImagen();
      header('location: /BienesRaices_POO/admin/index.php?resultado=3');
    
    }
     }

      //Eliminar la imagen
      public function borrarImagen(){
        //Comprobar si existe el archivo
      $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
      if($existeArchivo){
         unlink(CARPETA_IMAGENES . $this->imagen);
      }
      }

      public function actulizar(){
         //Sanitizar los datos
         $atributos = $this-> sanitizarAtributos();

         $valores=[];
         foreach($atributos as $key => $value){
            $valores[]="{$key}='{$value}'";
         }
 
            $query = "UPDATE " . static::$tabla . " SET ";
            $query .= join(', ', $valores );
            $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
            $query .= " LIMIT 1";

            $resultado = self::$db->query($query);
            
            if($resultado){
  //echo "Datos insertados correctamente.";
  header('location: /BienesRaices_POO/admin/index.php?resultado=2');
      }
      }
     public function crear(){
      //Sanitizar los datos
      $atributos = $this-> sanitizarAtributos();

      
            $query ="INSERT INTO " . static::$tabla . " (";
            $query .= join(', ', array_keys($atributos));
            $query .= ") VALUES (' ";
            $query .= join("', '", array_values($atributos));
            $query .= " ') ";
          
                  $RESULTADO = self::$db->query($query);
                  if($RESULTADO){
            //echo "Datos insertados correctamente.";
            header('location: /BienesRaices_POO/admin/index.php?resultado=1');
}
     }

     //Subida de archivos
     public function setImagen($imagen){

      //Eliminar la imagen previa
      if(!is_null($this->id)){
      $this->borrarImagen();
      }
      //Asignar al atributo de imagen el nombre de la imagen
      if($imagen){
         $this->imagen = $imagen;
      }
     }
     //Identificar y unir los atributos de la BD
     public function atributos(){
      $atributos = [];
      foreach(static::$columnasDB as $columna){
         if($columna ==='id')continue;
         $atributos[$columna] = $this->$columna;
      }
      return $atributos;
     }
    public function sanitizarAtributos(){
      $atributos = $this->atributos();
      
      $sanitizado = [];
      foreach($atributos as $key=> $value){
         $sanitizado[$key] = self::$db->escape_string($value);
      }
      return $sanitizado;
    }

    public static function getErrores(){
      return static::$errores;
    }

    public function validar(){
            static::$errores=[];            
            return static::$errores;
    }
      //Trae todo los registro.
      public static function all(){
         
         $query = "SELECT * FROM " . static::$tabla;
         $resultado = self::consultarSQL($query);
         return $resultado;

      }

       //Trae un limite de todos los registro.
      public static function GetLimit($cantidad){
         
         $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
         $resultado = self::consultarSQL($query);
         return $resultado;

      }

      //Trae un reguistro por el ID.
      public static function find($id){
         
         $query = "SELECT * FROM " . static::$tabla . " where id = $id;";
         $resultado = self::consultarSQL($query);
         return array_shift($resultado);

      }

      public static function consultarSQL($query){
            //consultar la base de datos
            $resultado = self::$db->query($query);

            //Iterar los resultados
            $array = [];
            while($registro = $resultado->fetch_assoc()){
               $array[] = static::crearObjeto($registro);
            }
               
            // liberar la memoria
            $resultado->free();
            // retornar los resultados
            return $array;
      }

      protected static function crearObjeto($registro){
         $objeto = new static;

         foreach($registro as $key => $value){
            if(property_exists($objeto, $key)){
               $objeto->$key = $value;
            }
         }

         
         return $objeto;
      }

      //sincronizar el objeto en memoria con los cambios realizados por el usuario.
      public function sincronizar ($args = []){

         foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){
               $this->$key = $value;
            }
         }
      }
}
