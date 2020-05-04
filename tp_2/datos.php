<?php

class Datos{

    public static function guardar($archivo, $datos)
    {
        $pFile = fopen($archivo, 'a');

        $rta = fwrite($pFile, $datos);
        
        fclose($pFile);
        return $rta;
    }

    public static function guardarJson($archivo, $datos)
    {
        $stringJson= Datos::LeerJson($archivo); 
        if($stringJson==null)
        {
            $stringJson=array();
        }
        array_push($stringJson,$datos);
        $pFile = fopen($archivo, 'w'); 
        $rta = fwrite($pFile, json_encode($stringJson));        
        fclose($pFile);
        return $rta;
    }

    public static function LeerJson($archivo)
    {
        
        $file = fopen($archivo,'r');
        $rta = '';    
        while(!feof($file)){
            $linea = json_decode(fgets($file));
            if($rta==''){
                $rta = $linea;
            }else{
                $rta = $rta.' '.$linea;
            }        
        }        
        return $rta;
    }

    public static function Leer($archivo)
    {
        $pFile = fopen($archivo, 'ab');
        $lista= array();

        while(!feof($pFile))
        {
            $linea=fgets($pfile);
            $explode=explode('@', $linea); 
            if(count($explode)>1)
            {
                array_push($lista, $explode);
            }
        }
        fclose($pFile);
        return $lista;
    }
}


