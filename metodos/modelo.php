<?php 

class Model {

    public static function sqlRegistarUsuario($id,$nombre,$apellido,$email,$newPwd){
        include("bd-conect/inclucion-bd.php");
        $sql = "INSERT INTO tb_usuarios(id,nombre,apellido,email,pasword,fecha_registro,id_cate_user,foto_user) ";
        $sql .= "VALUES($id,'$nombre','$apellido','$email','$newPwd',now(),'2','../../img/logo-icon-person.jpg')";
        return $resultado = $conexion->query($sql);
    }

    public static function sqlInicoSesion($email,$newPwd){
        include("bd-conect/inclucion-bd.php");
        $sql = "select (select id_cate_user from tb_usuarios where email = '$email' and pasword = '$newPwd' ), count(*) from tb_usuarios";
        return $resulatdo = $conexion->query($sql);
    }

    public static function sqlUsuario($des,$valor){
        include("bd-conect/inclucion-bd.php");
        if( $des == 1 ){
            $dato = "count(*)";
            $busca = "email";
        }if( $des == 2 ){
            $dato = "*";
            $busca = "email";
        }if( $des == 3){
            $dato = "*";
            $busca = "id";
        }
        $sql = "select $dato from tb_usuarios where $busca='$valor'";
        return $resulatdo = $conexion->query($sql);
    }

    public static function sqlCraerIdUsuario($des){
        include("bd-conect/inclucion-bd.php");
        if( $des == 1) $dato = "count(*)";
        if( $des == 2) $dato = "*";
        $sql = "select $dato from tb_usuarios ";
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

    public static function sqlMostrarProductos($search = null,$des = null,$categoria = null){
        include("bd-conect/inclucion-bd.php"); 
        if($des == 1 ){
            $sql = "select * from tb_productos ";
        }
        if( $des === 2){
            $sql = "select * from tb_productos ";
            if( $search != null )$sql .= Model::textoBuqueda($search);
        }
        if($des == 3 ){
            $sql = "select t1.id_producto,img,producto_nombre,precio,descripcion_producto ";
            $sql .= "from tb_productos as t1 ";
            $sql .="inner join tb_categoriasProducto as t2 on t1.id_producto = t2.id_producto ";
            $sql .= "inner join tb_categorias as t3 on t2.id_categoria = t3.id_Categoria ";
            if( $search != null ){
                $sql .= Model::textoBuqueda($search);
                $sql .= " and t3.categoria = '$categoria' ";
            }else{
                $sql .= "where t3.categoria = '$categoria' ";
            }
        }
       // echo $sql ;
        return $resulatdo = $conexion->query($sql);
    }

    private static function textoBuqueda($search){
        $palabra = explode(" ",$search);
        //var_dump($palabra);   
            $sql = "where ";
            for($i = 0; $i < count($palabra); $i++){
                $sql .= "(producto_nombre like '%".$palabra[$i]."%' or descripcion_producto like '%".$palabra[$i]."%' or id_producto like '%".$palabra[$i]."%')";       
                if($i != count($palabra)-1){
                    $sql .= " and ";
                }
            }
        return $sql;
    }

    public static function sqlEliminarProducto($id){
        include("bd-conect/inclucion-bd.php"); 
        Model::sqlEliminarFkProductos(1,$id);
        Model::sqlEliminarComentario($id);
        
        $sql = "DELETE FROM tb_productos WHERE id_producto = '$id'";
        return $resultado = $conexion->query($sql);
    }

    public static function sqlEliminarFkProductos($put,$id){
        include("bd-conect/inclucion-bd.php"); 
        if( $put == 1){
            $tabla = "tb_categoriasProducto";
        }/*if($put == 2){
            $tabla = "tb_megusta";
        }*/
        $sql = "DELETE FROM $tabla WHERE id_producto =  '$id'";
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
    /*
    public static function sqlAgregarMegustaProducos($id){
        include("bd-conect/inclucion-bd.php"); 
        $sql = "INSERT INTO  tb_megusta(id_producto)values('$id')";
        return $resulatdo = $conexion->query($sql);

    }*/

    public static function sqlVerificarPerfil($des,$id_user){
        include("bd-conect/inclucion-bd.php"); 
        if($des == 1){
            $dato = "id_cate_user";
        }if($des == 2){
            $dato = "nombre";
        }
        $sql = "select $dato from tb_usuarios where id = '$id_user'";
        return $resulatdo = $conexion->query($sql);
    }

    public static function sqlActualizarEstadoUser($des,$id_user){
        include("bd-conect/inclucion-bd.php"); 
        if($des == 1){
            $dato = "Activo";
        }if($des == 2){
            $dato = "Inactivo";
        }
        $sql = "update tb_usuarios set status_user = '$dato' where id= ('$id_user') ";
        //echo $sql; 
        return $resulatdo = $conexion->query($sql);
    }

    public static function sqlProductos($des,$id_pro){
        include("bd-conect/inclucion-bd.php"); 
        if($des == 1)$dato = "producto_nombre";
        if($des == 2)$dato = "descripcion_producto";
        if($des == 3)$dato = "caracteristicas_producto";
        if($des == 4)$dato = "cantidades";
        if($des == 5)$dato = "id_ofertas";
        if($des == 6)$dato = "img";
        if($des == 7)$dato = "precio";
        if($des == 8)$dato = "color";
        $sql = "SELECT $dato FROM tb_productos where id_producto = '$id_pro'";
        return $resulatdo = $conexion->query($sql);

    }

    public static function sqlMostrarCategorias(){
        include("bd-conect/inclucion-bd.php"); 
        $sql = "select * from tb_categorias";
        return $resulatdo = $conexion->query($sql);
    }

    public static function sqlAgregarCategoria($des,$categorias = null,$id_pro = null){
        include("bd-conect/inclucion-bd.php");
        if( $des == 1){
            $sql ="INSERT INTO tb_categoriasProducto(id_producto,id_categoria)values";
            for($i = 0; $i <count($categorias); $i ++){
                $sql .= "('$id_pro','$categorias[$i]')";
                if($i != count($categorias)-1){
                    $sql .= ",";
                }
            }
        }
        if($des == 2 ){
            $sql = "select count(*) from tb_categorias";
        }
        return $resulatdo = $conexion->query($sql);
    }

    public static function sqlActualizarImagen($img,$id_user){
        include("bd-conect/inclucion-bd.php");
        $sql = "UPDATE tb_usuarios ";
        $sql .= "set foto_user = '$img' ";
        $sql .= "where id = '$id_user'";
        return $resulatdo = $conexion->query($sql);
    }

    

}