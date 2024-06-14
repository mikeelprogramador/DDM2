<?php

class Vista{
    
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
            $salida .= "<tr>";
            $salida .= "<td>{$fila[0]}</td>";
            $salida .= "<td>{$fila[1]}</td>";
            $salida .= "<td>{$fila[2]}</td>";
            $salida .= "<td>{$fila[3]}</td>";
            $salida .= "<td>{$fila[4]}</td>";
            $salida .= "<td>{$fila[5]}</td>";
            $salida .= "<td><img src='{$fila[6]}' alt='Imagen del producto' class='img-fluid img-thumbnail' style='max-width: 100px; height: auto;'></td>"; // Imagen con clases de Bootstrap y estilos personalizados
            $salida .= "<td><button type='button'>Editar</button></td>"; // Botón de edición con clase de Bootstrap
            $salida .= "<td><button type='button' onclick='decision($fila[0])'>Eliminar</button></td>"; 
            $salida .= "</tr>";
        }
        $salida .= "</tbody></table>";
        $salida .= "</div>"; // Cierra el contenedor de tabla responsiva
        return $salida;
    }
}    