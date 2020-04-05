<?php

require_once __DIR__ .'/vendor/autoload.php';
include './Funciones.php';

use NNV\RestCountries;

$restCountries = new RestCountries;
//$paises= $restCountries->all();               //Muestra todos
//$paises= $restCountries->byName("Argentina");   //ESto lo trae por Nombre
//$restCountries->byLanguage("vi");             //esto lo trae or lenguaje
//$restCountries->byRegion("asia");             //Search by region: Africa, Americas, Asia, Europe, Oceania

//echo json_encode($paises);
$nombrePais= json_encode($restCountries->fields(["name"])->byName("Argentina"));
$nombre= (json_decode($nombrePais))[0]->name;

//echo "Muestro $nombre"; //Hasta aca muestra Argentina.

//$miPais = new $Pais ("TITA");
//$miPais = __construct($nombre);
//$miPais->mostrar();

buscarPais("TITA");



