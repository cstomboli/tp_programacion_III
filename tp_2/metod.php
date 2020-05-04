<?php

include_once 'usuarios.php';

class Metod{ 

    public $request_method;
    public $path_info;

    public function __construct($request_method, $path_info)
    {
        $this->request_method= $request_method;
        $this->path_info= $path_info;
    }

    public function Conexion()
    {
        switch ($this->request_method) 
        {
            case 'POST':
                switch ($this->path_info) 
                {
                    case '/signin':
                        if(isset($_POST['email']) && isset($_POST['clave']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono']) && isset($_POST['tipo'])) // no entra
                        {
                            $usuario= new Usuarios($_POST['email'], $_POST['clave'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['tipo']);
                            $usuario->GuardaUsuario(); 
                            echo "Usuario creado correctamente.";
                        }
                        else{
                            echo "nop";
                        }
                        break;
                        
                    case '/login': 
                        if(isset($_POST['email']) && isset($_POST['clave'])) 
                        {
                            if(Usuarios::Buscar($_POST['email'], $_POST['clave']))
                            {
                                echo "Ingreso correcto";
                            }
                        }
                        break;
                }
                break;
            case 'GET':
                switch ($this->path_info) 
                {
                    case '/detalle':
                        if(isset($_GET['token']))
                        {
                            $usuario=Usuarios::BuscarToken($_GET['token']);                            
                        }
                        break;
                        
                    case '/lista': //La funcion muestra lo que le indican, si es admin o user.
                        if(isset($_GET['tipo']))
                        {
                            $usuario=Usuarios::BuscarTipo($_GET['tipo']);                            
                        }                       
                        break;
                }
                break;
            default:
                echo"Metodo invalido";
                break;
        }
        $respuesta = new stdClass;
        $respuesta -> success = true;
        //$respuesta -> datos = $datos;
    }
}