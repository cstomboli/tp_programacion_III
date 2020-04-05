<?php

class funciones extends paises
{
    function saludarEspanol($nombre)
    {
        $persona = new Persona(' Juan ');
        echo $persona ->saludar();
    }

}
