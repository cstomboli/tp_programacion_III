<?php

// https://github.com/firebase/php-jwt
//genero un token con encode

$key= "example_key";
$payload = array(
    "iss" => "http://example.org"
);
$jwt= JWT::encode($payload,$key);
//echo "$jwt"; 

//recibo y decodifico un jwt con decode

$headers = getallheaders();
$mitoken=$headers['mi_token']??'';
//print_r($mitoken); // Esto me tendria q devolver un toke, no  example_key|

/*
try{
    $decoded = JWT::decode($mitoken, $key, array('HS256'));
    print_r($decoded);
}
catch(\Throwable $th){
    echo $th->getMessage();
}

die(); */