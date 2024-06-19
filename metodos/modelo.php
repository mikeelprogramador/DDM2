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
    /**
     * Metodo para verificar si un producto y para mostrar un producto 
     * param @palabra la palabra clave para buscar o mostrar
     */
    public static function sqlverificarProducto($id,$palabra){
        include("bd-conect/inclucion-bd.php");
        if( $palabra == "mostrar" ){
            $sql = "select * ";
        }
        if( $palabra == "buscar" ){
            $sql = "select count(*) ";
        }
        $sql .= "from tb_productos where id_producto = '$id'";
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
                $sql .= "(producto_nombre like '%".$palabra[$i]."%' or descripcion_producto like '%".$palabra[$i]."%' or id_producto like '%".$palabra[$i]."%')";       
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
        Model::sqlEliminarComentario($id);
        $sql = "DELETE FROM tb_productos WHERE id_producto = '$id'";
        return $resultado = $conexion->query($sql);
    }

    public static function sqlEliminarProductoCategoria($id){
        include("bd-conect/inclucion-bd.php"); 
        $sql = "DELETE FROM tb_categoriasProducto WHERE id_producto =  '$id'";
        $resultado = $conexion->query($sql);
    }
    /**
     * comentra bien este metodo, 4 parametros
     * param @$id  codigo del producto
     * param @$put clave de paso 
     * param @id_comen codigo comentario
     * param @id_user codigo usuario
     */
    public static function sqlEliminarComentario($id = null, $put = null, $id_comen = null, $id_user = null){
        include("bd-conect/inclucion-bd.php");
        $sql = "DELETE FROM tb_comentarios ";
        if( $put == "eliminar" ){
            $sql .= "where id_comentario = '$id_comen' and id_usuario = '$id_user' ";
        }
        if( $id != null){
            $sql .= "where id_producto = '$id'";
        }
        return $resultado = $conexion->query($sql);
    }

    public static function sqlComentarios($comentario,$id_producto,$id_usuario){
        include("bd-conect/inclucion-bd.php"); 
        $sql = "INSERT INTO tb_comentarios(comentario,fechaComentario,id_producto,id_usuario)";
        $sql .= "value('$comentario',now(),'$id_producto','$id_usuario')";
        return $resulatdo = $conexion->query($sql);
    }

    public static function sqlViewComentarios($id_pro){
        include("bd-conect/inclucion-bd.php"); 
        $sql = "select tb_usuarios.nombre,comentario,fechaComentario,tb_usuarios.id,id_comentario ";
        $sql .= "from tb_comentarios "; 
        $sql .= "inner join tb_usuarios on tb_comentarios.id_usuario = tb_usuarios.id ";
        $sql .= "inner join tb_productos on tb_comentarios.id_producto = tb_productos.id_producto ";
        $sql .= "where tb_productos.id_producto = '$id_pro' ";
        return $resultado = $conexion->query($sql);
    }


}