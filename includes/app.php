<?php
include "funciones.php";
include "config/datebase.php";
include __DIR__ . "/../vendor/autoload.php";

//Hacer la coneccion a la base de datos
$db = conectarDB();

use App\Propiedad;
Propiedad::setDB($db);