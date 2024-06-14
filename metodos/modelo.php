<?php 

class Model {

    public static function sqlRegistarUsuario($id,$nombre,$apellido,$email,$newPwd){
        include("bd-conect/inclucion-bd.php");
        $sql = "INSERT INTO tb_usuarios(id,nombre,apellido,email,pasword,fecha_registro,cater_user) ";
        $sql .= "VALUES($id,'$nombre','$apellido','$email','$newPwd',now(),'user1')";
        return $resultado = $conexion->query($sql);
    }

    public static function sqlInicoSesion($email,$newPwd){
        include("bd-conect/inclucion-bd.php");
        $sql = "select (select cater_user from tb_usuarios where email = '$email' and pasword = '$newPwd' ), count(*) from tb_usuarios";
        return $resulatdo = $conexion->query($sql);
    }

    public static function sqlUsuario($email,$ban = null){
        include("bd-conect/inclucion-bd.php");
        if( $ban == null )$sql = "select * ";
        else{
            $sql = "select count(*) ";
        }
        $sql .= "from tb_usuarios where email='$email'";
        return $resulatdo = $conexion->query($sql);
    }

    public static function sqlId(){
        include("bd-conect/inclucion-bd.php");
        $sql = "select count(*) from tb_usuarios ";
        return $resulatdo = $conexion->query($sql);
    }

    public static function sqlCargarProducto($id,$nombre,$descrip,$caracter,$cantidad,$oferta,$img,$precio,$color){
        include("bd-conect/inclucion-bd.php");
        $sql = "INSERT INTO tb_productos";
        $sql .= "(id_producto,producto_nombre,descripcion_producto,caracteristicas_producto,cantidades,id_ofertas,img,precio,color)";
        $sql.= "VALUE('$id','$nombre','$descrip','$caracter','$cantidad','$oferta','$img','$precio','$color')";
        return $resulatdo = $conexion->query($sql);
    }

    public static function sqlverificarProducto($id){
        include("bd-conect/inclucion-bd.php");
        $sql = "select count(*) from tb_productos where id_producto = '$id'";
        return $resulatdo = $conexion->query($sql);
    }

    public static function sqlMostrarProductos($search = null){
        include("bd-conect/inclucion-bd.php"); 
        $sql = "select * from tb_productos ";
        $palabra = explode(" ",$search);
        //var_dump($palabra);
        if( $search != null ){
            $sql .= "where ";
            for($i = 0; $i < count($palabra); $i++){
                $sql .= "(producto_nombre like '%".$palabra[$i]."%' or descripcion_producto like '%".$palabra[$i]."%')";       
                if($i != count($palabra)-1){
                    $sql .= " and ";
                }
            }
        }
        return $resulatdo = $conexion->query($sql);
    }

    public static function sqlEliminarProducto($id){
        include("bd-conect/inclucion-bd.php"); 
        Model::sqlEliminarProductoCategoria($id);
        $sql = "DELETE FROM tb_productos WHERE id_producto = '$id'";
        return $resultado = $conexion->query($sql);
    }

    public static function sqlEliminarProductoCategoria($id){
        include("bd-conect/inclucion-bd.php"); 
        $sql = "DELETE FROM tb_categoriasProducto WHERE id_producto =  '$id'";
        $resultado = $conexion->query($sql);
    }

}