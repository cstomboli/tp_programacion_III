<?php 

class paises implements IInterface{

    public $nombre;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public static function mostrar()
    {
        echo "El pais ingresado es" .$this->nombre;
    } 
    
}