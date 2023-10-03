<?php
namespace App;
class Propiedad extends activeRecord{

    protected static $columnasDB = ['id','titulo','precio','imagen','descripcion',
   'habitaciones','wc','estacionamiento','Creado','vendedores_id'];
  protected static $tabla = 'propiedades';



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
        $this->id = $args['id'] ?? null;
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
}