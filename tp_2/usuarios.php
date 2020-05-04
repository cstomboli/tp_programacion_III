<?php

include 'datos.php';
use \Firebase\JWT\JWT;


class Usuarios{

    public $email;
    public $clave;
    public $nombre;
    public $apellido;
    public $telefono;
    public $tipo;


    public function __construct($email, $clave, $nombre, $apellido, $telefono,$tipo )
    {
        $this->email= $email;
        $this->clave= $clave;
        $this->nombre= $nombre;
        $this->apellido= $apellido;
        $this->telefono= $telefono; 
        $this->tipo = $tipo;
        
    }
    /*
    public function Tipo()
    {
        if($this->tipo == true)
        {
            $this->tipo ="admin";            
        } 
        else
        {
            $this->tipo ="user";
        } 
        echo"$this->tipo";  
    } */
    
    public function GuardaUsuario()
    {
        return Datos::guardarJson('datos.json', $this); 
    }

    public function Leer()
    {
        return Datos::leerJson('datos.json');
    }

    public static function Buscar($email, $clave)
    {
        $array = Datos::leerJson('datos.json');
        $retorno= false;

        foreach($array as $value)
        {
            //var_dump($value->email);
            //echo"mi mail es $email";
            if($value->email == $email)
            {
                if($value->clave ==$clave)
                {
                    //$usuarioValido=$value;
                    $retorno=true;
                    
                    $key= "example_key";
                    $payload = array(

                        "email" => $email,
                        "clave" => $clave,
                        "nombre"=>$value->nombre,
                        "apellido"=>$value->apellido,
                        "telefono"=>$value->telefono,
                        "tipo"=>$value->tipo
                    );
                    $jwt= JWT::encode($payload,$key);
                    echo "$jwt"; 
                    //var_dump($payload);
                    break; 
                }
                else
                {
                    echo"Contraseña incorrecta";
                }
            }
            else
            {
                echo "Usuario incorrecto.";                
            }           
        }
        return $retorno;
    }
    public static function BuscarToken($token)
    {
        $key= "example_key";
        try{
            $decoded = JWT::decode($token, $key, array('HS256'));
           /* $retorno=array("Mail"=>$decoded->email, "Clave"=>$decoded->clave, "Nombre"=>$decoded->nombre, 
            "Apellido"=>$decoded->apellido, "Telefono"=>$decoded->telefono, "Tipo"=>$decoded->tipo);*/

            echo "Mail: ". $decoded->email . PHP_EOL . "Clave: " .$decoded->clave . PHP_EOL . "Nombre: ". $decoded->nombre 
            . PHP_EOL . "Apellido: " . $decoded->apellido . PHP_EOL . "Telefono: ". $decoded->telefono . PHP_EOL . "Tipo: ".$decoded->tipo;
        }
        catch(Exception $e){
            echo "Token no valido -> ". $e->getMessage();
        }
    }

    public static function BuscarTipo($tipo)
    {
        $array = Datos::leerJson('datos.json');
        $responde= false;

        foreach($array as $value)
        {
            if($value->tipo == $tipo && $tipo== 'admin')
            {
                echo "Usuario: " . $value->nombre . PHP_EOL . "Tipo: " . $value->tipo . PHP_EOL;
                $responde=true;
            }
            elseif($value->tipo == $tipo && $tipo== 'user')            
            {
                echo "Usuario: " . $value->nombre . PHP_EOL . "Tipo: " . $value->tipo . PHP_EOL;
            }
        }
        return $responde;
        
    }


}


