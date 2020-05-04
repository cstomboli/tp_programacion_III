<?php

//composer init, composer require firebase/php-jwt
include 'vendor/autoload.php';
include_once 'metod.php';

$metod= new Metod($_SERVER ['REQUEST_METHOD'], $_SERVER ['PATH_INFO']);
$metod->Conexion();
