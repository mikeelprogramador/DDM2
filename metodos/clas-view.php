<?php

class Vista{
    /**
     * Funcion para buscar y moestar la flast card de los productos
     */
    public static function mostrarProductos($text = null){
        include_once("modelo.php");
        include_once("../../cajon/bootstrap/bootstrap.php");
        $salida = "";
        $consulta = Model::sqlMostrarProductos($text);
        while($fila = $consulta->fetch_assoc()){
            $id = id::encriptar($fila['id_producto']);
            $salida .= '<div class="home">';
            $salida .= '<div class="card" style="width: 18rem;">';
            $salida .= '<img src="'.$fila['img'].'" class="card-img-top" alt="La imagen no ha sido ubicado">';
            $salida .= '<div class="card-body">';
            $salida .= '<h5 class="card-text">COP $ '.$fila['precio'].'</h5>';
            $salida .= '<h5 class="card-title">'.$fila['producto_nombre'].'</h5>';
            $salida .= '<p class="card-text">'.$fila['descripcion_producto'].'</p>';
            $salida .= '<a href="../user/ddm.php?seccion=producto&data='.$id.'" class="btn btn-primary">Comprar</a>';
            $salida .= '</h5>';
            $salida .= '</div>';
            $salida .= '</div>';
            $salida .= '<br><br>';
        }
        return $salida;
    }
    /**
     * Funcion de peticion asincrona para busacr los productos en tiempo real
     */
    public static function buscarProducto($text = null){
        include_once("modelo.php");
        include_once("../../cajon/bootstrap/bootstrap.php");
        $salida = "<div class='table-responsive'>"; // Añade un contenedor para la tabla responsiva
        $salida .= "<table class='table table-striped table-hover'>"; // Añade clases de Bootstrap para la tabla
        $salida .= "<thead class='thead-dark'><tr>";
        $salida .= "<th scope='col'>ID</th>";
        $salida .= "<th scope='col'>Nombre</th>";
        $salida .= "<th scope='col'>Descripción</th>";
        $salida .= "<th scope='col'>Caracteristicas</th>";
        $salida .= "<th scope='col'>Precio</th>";
        $salida .= "<th scope='col'>Cantidad</th>";
        $salida .= "<th scope='col'>Imagen</th>";
        $salida .= "<th scope='col'>Editar</th>";
        $salida .= "<th scope='col'>Eliminar</th>";
        $salida .= "</tr></thead><tbody>"; // Encabezado de la tabla con clase 'thead-dark'
    
        $consulta = Model::sqlMostrarProductos($text);
        while($fila = $consulta->fetch_array()){
            $id = id::encriptar($fila[0]);
            $salida .= "<tr>";
            $salida .= "<td>{$fila[0]}</td>";
            $salida .= "<td>{$fila[1]}</td>";
            $salida .= "<td>{$fila[2]}</td>";
            $salida .= "<td>{$fila[3]}</td>";
            $salida .= "<td>COP $ {$fila[7]}</td>";
            $salida .= "<td>{$fila[4]}</td>";
            $salida .= "<td><img src='{$fila[6]}' alt='Imagen del producto' class='img-fluid img-thumbnail' style='max-width: 100px; height: auto;'></td>"; // Imagen con clases de Bootstrap y estilos personalizados
            $salida .= "<td><a href='admin.php?seccion=edit&data=$id'><button type='button'>Editar</button></a></td>"; // Botón de edición con clase de Bootstrap
            $salida .= "<td><button type='button' onclick='decision(\"{$fila[0]}\")'>Eliminar</button></td>"; 
            $salida .= "</tr>";
        }
        $salida .= "</tbody></table>";
        $salida .= "</div>"; // Cierra el contenedor de tabla responsiva
        return $salida;
    }
    /**
     * Metodo para visualizar la lista de productos
     */
    public static function ContenidoProducto($id){
        include_once("modelo.php");
        include_once("../../cajon/bootstrap/bootstrap.php");
        $salida = "";
        $consulta = Model::sqlverificarProducto($id,"mostrar");
        while($fila = $consulta->fetch_array()){
            $salida .= $fila[1]."<br>";
            $salida .= $fila[2]."<br>";
            $salida .= $fila[3]."<br>";
            $salida .= $fila[4]."<br>";
            $salida .= $fila[5]."<br>";
            $salida .= "<img src='{$fila[6]}'>"."<br>";
            $salida .= $fila[7]."<br>";
            $salida .= $fila[8]."<br>";
            
        }
        return $salida;
    }

    /**
     * Metodo para visuarliza los comentarios
     */
    public static function viewComentarios($id_pro,$id_user){
        include_once("modelo.php");
        $salida = "";
        $consulta = Model::sqlViewComentarios($id_pro);
        while($fila = $consulta->fetch_array()){
            $salida .= $fila[0]."<br>";
            $salida .= $fila[1]."<br>";
            $salida .= $fila[2]."<br>";
            if( $fila[3] == $id_user){
                $salida.= "<a href='#'>Actailizar</a><br>";
                $salida.= "<a href='#' onclick='eliminarComentario(\"$fila[4]\",\"$id_pro\")'>Eliminar</a><br>";
            }
            $salida .= "<a href='#'>Responder</a><br><br>";
        }
        return $salida;
    }

}    