<?php
namespace App;



class Propiedad{
   //variable de la base de datos.     
   protected static $db;
   protected static $columnasDB = ['id','titulo','precio','imagen','descripcion',
'habitaciones','wc','estacionamiento','Creado','vendedores_id'];
   
    //Errores
    protected static $errores = [];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones; 
    public $wc;
    public $estacionamiento;
    public $Creado;
    public $vendedores_id;

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
        $this->Creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
     }
 public static function setDB($database){
      self::$db= $database;

     }


     public function guardar(){
      if(isset($this->id)){

         $this->actulizar();
      }else{
         $this->guardar();
      }
     }
      public function actulizar(){
         //Sanitizar los datos
         $atributos = $this-> sanitizarAtributos();

         $valores=[];
         foreach($atributos as $key => $value){
            $valores[]="{$key}='{$value}'";
         }
 
            $query = "UPDATE propiedades SET ";
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

      
            $query ="INSERT INTO propiedades (";
            $query .= join(', ', array_keys($atributos));
            $query .= ") VALUES (' ";
            $query .= join("', '", array_values($atributos));
            $query .= " ') ";
          
      $RESULTADO = self::$db->query($query);
      return $RESULTADO;
     }

     //Subida de archivos
     public function setImagen($imagen){

      //Eliminar la imagen previa
      if(isset($this->id)){
      //Comprobar si existe el archivo
      $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
      if($existeArchivo){
         unlink(CARPETA_IMAGENES . $this->imagen);
      }
      }
      //Asignar al atributo de imagen el nombre de la imagen
      if($imagen){
         $this->imagen = $imagen;
      }
     }
     //Identificar y unir los atributos de la BD
     public function atributos(){
      $atributos = [];
      foreach(self::$columnasDB as $columna){
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
      return self::$errores;
    }

    public function validar(){
      
            if(!$this->titulo){
            self::$errores[]='Titulo obligatorio.';
            }

            if(!$this->precio){
            self::$errores[]="Precio obligatorio.";
            }

            if(($this->descripcion) < 25){
            self::$errores[]="Descripcion obligatoria y debe de tener al menos 25 caracteres.";
            }

            if(!$this->habitaciones){
            self::$errores[]="habitaciones obligatoria.";
            }
            if(!$this->wc){
            self::$errores[]="Baños obligatoria.";
            }
            if(!$this->estacionamiento){
            self::$errores[]="Estacionamiento obligatoria.";
            }
            if(!$this->vendedores_id){
            self::$errores[]="Vendedor obligatoria.";
            }
            if(!$this->imagen){
            self::$errores[]="La imagen es obligatiria.";
            }
         
            return self::$errores;
    }
      //Trae todo los reguistro.
      public static function all(){
         
         $query = "SELECT * FROM propiedades;";
         $resultado = self::consultarSQL($query);
         return $resultado;

      }

      //Trae un reguistro por el ID.
      public static function find($id){
         
         $query = "SELECT * FROM propiedades where id = $id;";
         $resultado = self::consultarSQL($query);
         return array_shift($resultado);

      }

      public static function consultarSQL($query){
            //consultar la base de datos
            $resultado = self::$db->query($query);

            //Iterar los resultados
            $array = [];
            while($registro = $resultado->fetch_assoc()){
               $array[] = self::crearObjeto($registro);
            }
               
            // liberar la memoria
            $resultado->free();
            // retornar los resultados
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

      //sincronizar el objeto en memoria con los cambios realizados por el usuario.
      public function sincronizar ($args = []){

         foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){
               $this->$key = $value;
            }
         }
      }


}