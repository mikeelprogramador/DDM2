<?php

class Vista{
    
    public static function mostrarProductos(){
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
            $salida .= '<a href="../user/ddm.php?seccion=producto&id='.$id.'" class="btn btn-primary">Comprar</a>';
            $salida .= '</div>';
            $salida .= '</div>';
            $salida .= '</div>';
            $salida .= '<br><br>';
        }
        return $salida;
    }

    public static function buscarProducto($text = null){
        include_once("modelo.php");
        $salida = "";
        $consulta = Model::sqlMostrarProductos($text);
        while($fila=$consulta->fetch_array()){
            $salida .= $fila[0]."<br>";
            $salida .= $fila[1]."<br>";
            $salida .= $fila[2]."<br>";
            $salida .= $fila[3]."<br>";
            $salida .= $fila[4]."<br>";
            $salida .= $fila[5]."<br>";
            $salida .= $fila[6]."<br>";
            $salida .= $fila[7]."<br>";
            $salida .= $fila[8]."<br>";
        }
        return $salida;
    }
}
