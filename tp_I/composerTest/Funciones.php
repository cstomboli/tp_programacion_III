<?php

require 'Pais.php'; 

class Funciones extends Pais
{
    function buscarPais($nombre)
    {
        $paises = new Pais('Juan');
        echo $paises ->mostrar();
    }

}