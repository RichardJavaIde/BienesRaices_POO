<?php
namespace App;

class vendedor extends activeRecord{
    protected static $columnasDB = ['id','nombre','apellido','telefono'];
    protected static $tabla = 'vendedores';

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    
    public function __construct($args = [])
     {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
     
     }

     public function validar(){
      
            if(!$this->nombre){
            self::$errores[]='Nombre obligatorio.';
            }

            if(!$this->apellido){
            self::$errores[]="Apellido obligatorio.";
            }

            if(!$this->telefono){
            self::$errores[]="Telefono obligatori.";
            }

            if(!preg_match('/[0-9]{10}/',$this->telefono)){
            self::$errores[]="Telefono debe contener solo numero y 10 digitos.";
            }
            return self::$errores;
         
         }
}