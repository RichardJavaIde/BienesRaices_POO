<?php
include "funciones.php";
include "config/datebase.php";
include __DIR__ . "/../vendor/autoload.php";

use App\Propiedad;
$propiedad = new Propiedad;
var_dump($propiedad);