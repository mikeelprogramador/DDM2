<?php
class cargarProducto {

    public static function cargarProducto($id,$nombre,$descrip,$caracter,$color,$cantidad,$oferta,$img,$precio){
        $salida = 0;
       include_once("modelo.php");
       if(cargarProducto::verificarProducto($id) == 1){
           $salida += 0;
       }else{
            $consulta = Model::sqlCargarProducto($id,$nombre,$descrip,$caracter,$color,$cantidad,$oferta,$img,$precio);
            if($consulta){
                $salida += 1;
            }else{
                $salida += 2;
            }
        }
       return $salida;
    }

    public static function verificarProducto($id){
        include_once("modelo.php");
        $salida = 0;
        $consulta = Model::sqlverificarProducto($id);
        while($fila=$consulta->fetch_array()){
            if($fila[0] == 1){
                $salida += 1;
            }else{
                $salida +=0;
            }
        }
        return $salida;
    }

    public static function img($img){
        $salida = "";
        $file = $img;
        $tamaño = $file["size"];
        $nombre = $file["name"];
        $tipo = pathinfo($nombre, PATHINFO_EXTENSION); 
        $ruta_provicional = $file["tmp_name"];
        $carpeta = "../../fotos/";    
        if($tipo != 'jpg' && $tipo != 'png' && $tipo != 'gif'&& $tipo != 'tiff' && $tipo != 'psd'&& $tipo != 'bmp'){
            $salida = "0";
        }else if($tamaño > 3*1024*1024){
            $salida = "1";
        }else{
            $src = $carpeta.$nombre;
            move_uploaded_file($ruta_provicional,$src);
            $salida .= "../../fotos/".$nombre;
        }
        return $salida;
    }
}
