<?php

require_once __DIR__ .'/vendor/autoload.php';


use NNV\RestCountries;

$restCountries = new RestCountries;

$paises= $restCountries->all();
//$paises= $restCountries->byName("Argentina");
echo json_encode($paises);