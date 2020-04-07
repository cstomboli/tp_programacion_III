<?php

class Pais{
    
    public $nombre;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public function mostrar()
    {
        echo "El pais ingresado es " .$this->nombre;
    } 
}