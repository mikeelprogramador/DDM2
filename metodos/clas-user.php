<?php
class Productos{
    public static function crearComentarios($comentario,$id_producto,$id_usuario){
        include_once("modelo.php");
        $salida = 0;
        $consulta = Model::sqlComentarios($comentario,$id_producto,$id_usuario);
        if($consulta){
            $salida = 1;
        }
        return $salida; 
    }
    public static function eliminarComentarios($id_comen, $id_user){
        include_once("modelo.php");
        $salida = 0;
        $consulta = Model::sqlEliminarComentario("","eliminar",$id_comen, $id_user);
        if($consulta){
            $salida = 1;
        }
        return $salida; 
    }
}