<?php

require 'paises.php'; 

class funciones extends paises
{
    function buscarPais($nombre)
    {
        $paises = new paises('Argentina');
        echo $nombre ->mostrar();
    }
    

    function saludarEspanol($nombre)
    {
        $paises = new Persona(' Juan ');
        echo $paises ->saludar();
    }

}
