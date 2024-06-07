<?php

class Vista{
    
    public static function mostrarProductos($idUser = null){
        include_once("modelo.php");
        include_once("../../cajon/bootstrap/bootstrap.php");
        $salida = "";
        $consulta = Model::sqlMostrarProductos();
        while($fila = $consulta->fetch_assoc()){
            $id = id::encriptar($fila['id_producto']);
            $salida .= '<div class="home">';
            $salida .= '<div class="card" style="width: 18rem;">';
            $salida .= '<img src="'.$fila['img'].'" class="card-img-top" alt="La imagen no ha sido ubicado">';
            $salida .= '<div class="card-body">';
            $salida .= '<h5 class="card-title">'.$fila['producto_nombre'].'</h5>';
            $salida .= '<p class="card-text">'.$fila['descripcion_producto'].'</p>';
            $salida .= '<a href="../user/ddm.php?caht='.$idUser.'&seccion=producto&id='.$id.'" class="btn btn-primary">Comprar</a>';
            $salida .= '</div>';
            $salida .= '</div>';
            $salida .= '</div>';
            $salida .= '<br><br>';
        }
        return $salida;
    }
}
