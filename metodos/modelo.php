<?php 

class Model {

    public static function sqlRegistarUsuario($id,$nombre,$apellido,$email,$newPwd){
        include("bd-conect/inclucion-bd.php");
        $sql = "INSERT INTO tb_usuarios(id,nombre,apellido,email,pasword,fecha_registro) ";
        $sql .= "VALUES($id,'$nombre','$apellido','$email','$newPwd',now())";
        return $resultado = $conexion->query($sql);
    }

    public static function sqlInicoSesion($email,$newPwd){
        include("bd-conect/inclucion-bd.php");
        $sql = "select * from tb_usuarios where email='$email' and pasword='$newPwd'";
        return $resulatdo = $conexion->query($sql);
    }

    public static function sqlUsuario($email){
        include("bd-conect/inclucion-bd.php");
        $sql = "select * from tb_usuarios where email='$email'";
        return $resulatdo = $conexion->query($sql);
    }

    public static function sqlId(){
        include("bd-conect/inclucion-bd.php");
        $sql = "select count(*) from tb_usuarios ";
        return $resulatdo = $conexion->query($sql);
    }

    public static function sqlCargarProducto($id,$nombre,$descrip,$caracter,$color,$cantidad,$oferta,$img,$precio){
        include("bd-conect/inclucion-bd.php");
        $sql = "INSERT INTO tb_productos";
        $sql .= "(id_producto,producto_nombre,descripcion_producto,caracteristicas_producto,id_p_c,cantidades,id_ofertas,img,precio)";
        $sql.= "VALUE('$id','$nombre','$descrip','$caracter','$color','$cantidad','$oferta','$img','$precio')";
        return $resulatdo = $conexion->query($sql);
    }

    public static function sqlverificarProducto($id){
        include("bd-conect/inclucion-bd.php");
        $sql = "select count(*) from tb_productos where id_producto = '$id'";
        return $resulatdo = $conexion->query($sql);
    }

    public static function sqlMostrarProductos(){
        include("bd-conect/inclucion-bd.php"); 
        $sql = "select * from tb_productos";
        return $resulatdo = $conexion->query($sql);
    }

}