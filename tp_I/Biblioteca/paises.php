<?php 

require 'IInterface.php';

class paises implements IInterface{

    public $nombre;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public function mostrar()
    {
        echo "El pais ingresado es" .$this->nombre;
    } 
   

    public function saludar()
    {
        echo "HOla" .$this->nombre;
    }
    
}