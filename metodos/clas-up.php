<?php
class cargarProducto {

    public static function upProducto($id,$nombre,$descrip,$caracter,$color,$cantidad,$oferta,$img,$precio){
        $salida = "";
       include("bd-conect/inclucion-bd.php");
       $verifica = cargarProducto::verificar($id);
       if($verifica == 1){
           $salida .= "El codigo de este producto ya se encuntra creado";
       }if($verifica ==0){
            $sql = "INSERT INTO tb_productos(id_producto,producto_nombre,descripcion_producto,caracteristicas_producto,id_p_c,cantidades,id_ofertas,img,precio)";
            $sql.= "VALUE('$id','$nombre','$descrip','$caracter','$color','$cantidad','$oferta','$img','$precio')";
            $consulta = $conexion->query($sql);
            if($consulta){
                $salida .= "El producto se ha cardo exitosamente";
                header("location: ../../adm/admin.php?seccion=seccion1");
            }else{
                $salida .= "Hubo un error al subir el archivo";
            }
       }
       $conexion->close();
       return $salida;
    }

    public static function verificar($id){
        $salida = 0;
        include("bd-conect/inclucion-bd.php");
        $sql = "select * from tb_productos where id_producto = '$id'";
        $consulta = $conexion->query($sql);
        if($conexion->affected_rows >0){
            $salida += 1;
        }else{
            $salida +=0;
        }
        $conexion->close();
        return $salida;
    }

    public static function img($img){
        $salida = "";
        $file = $img;
        $nombre = $file["name"];
        $tipo = pathinfo($nombre, PATHINFO_EXTENSION); 
        $ruta_provicional = $file["tmp_name"];
        $carpeta = "../../fotos/";    
        if($tipo != 'jpg' && $tipo != 'png' && $tipo != 'JPG'){
            echo "Error, el archivo tiene que ser jpg o png";
        }else{
            $src = $carpeta.$nombre;
            move_uploaded_file($ruta_provicional,$src);
            $salida .= "../../fotos/".$nombre;
        }
        return $salida;
    }
}
