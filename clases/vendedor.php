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

}