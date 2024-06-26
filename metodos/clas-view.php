<?php
if(! isset($_SESSION))session_start();
if(! isset($_SESSION['token'])) $_SESSION['token'] = "";
class Vista{
    /**
     * Funcion para buscar y moestar la flast card de los productos
     */
    public static function mostrarProductos($text = null,$des = null,$cate = null) {
        include_once("modelo.php");
        include_once("../../cajon/bootstrap/bootstrap.php");
        $salida = '<div class="container mt-4">'; 
        $salida .= '<div class="row">';  
        $token = token::Obtener_token(64);
        $_SESSION['token'] = $token; 
        $consulta = Model::sqlMostrarProductos($text,$des,$cate);
        while ($fila = $consulta->fetch_assoc()) {
            $id = id::encriptar($fila['id_producto']);
            $salida .= '<div class="col-sm-6 col-md-4 col-lg-3 mb-4">'; 
            $salida .= '<div class="card h-100" style="width: 100%;">';  
            $salida .= '<img src="'.$fila['img'].'" class="card-img-top" alt="La imagen no ha sido ubicada">';
            $salida .= '<div class="card-body d-flex flex-column">';
            $salida .= '<h5 class="card-title">'.$fila['producto_nombre'].'</h5>';
            $salida .= '<p class="card-text">COP $ '.$fila['precio'].'</p>';
            $salida .= '<p class="card-text">'.$fila['descripcion_producto'].'</p>';
            $salida .= '<a href="../../descripcion/acerca_del_producto/product.php?http='.urlencode($token).'&data='.$id.'" class="btn btn-primary mt-auto"  >Comprar</a>';  
            $salida .= '</div>';
            $salida .= '</div>';
            $salida .= '</div>';
        }
        $salida .= '</div>'; 
        $salida .= '</div>';  
        return $salida;
    }
    /**
     * Funcion de peticion asincrona para busacr los productos en tiempo real
     */
    public static function buscarProducto($text = null, $des = null){
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
    
        $consulta = Model::sqlMostrarProductos($text,$des);
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
            $salida .= "<input type='checkbox' name='agregar' id='like'>Agregar  <br> ";
            $salida .= "<input type='checkbox' name='like' id='like' onclick='megusta(this)'>Like <br> ";
            $salida .= "<input type='checkbox' name='like' id='dislike' onclick='megusta(this)'>Dislike<br>    ";
            $salida .= "<a href='#'>Comprar</a> <br><br>    ";
            
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
                $salida.= "<button>Editar</button><br>";
                $salida.= "<button onclick='eliminarComentario(\"$fila[4]\",\"$id_pro\")'>Eliminar</button><br>";
            }
            $salida .= "<button>Responder</button><br><br>";
        }
        return $salida;
    }

    public static function perfil($id_user,$des){
        include_once("modelo.php");
        $salida = "";
        $consulta = Model::sqlUsuario(3,$id_user);
        while($fila = $consulta->fetch_array()){
            $salida .= "<div class='container mt-5'>";
            $salida .= "<div class='row justify-content-center'>";
            $salida .= "<div class='col-md-4'>";
            $salida .= "<div class='circle text-center bg-primary text-white rounded-circle' >";
            $salida .= "<img src='$fila[8]' class='img-fluid' id='imagen_perfil' alt='No cargaste la imagen en la base' onmouseenter='cambiarFoto(this)'>";
            $salida .= "</div>";
            $salida .= "</div>";
            $salida .= "<div class='col-md-8'>";
            $salida .= "<div class='mb-3'>";
            $salida .= "<label class='form-label'>Nombre</label>";
            $salida .= "<input type='text' class='form-control' id='edit_nombre' value='$fila[1]' disabled>";
            $salida .= "</div>";
            $salida .= "<div class='mb-3'>";
            $salida .= "<label class='form-label'>Apellido</label>";
            $salida .= "<input type='text' class='form-control' id='edit_apellido' value='$fila[2]' disabled>";
            $salida .= "</div>";
            $salida .= "<div class='mb-3'>";
            $salida .= "<label class='form-label'>Correo</label>";
            $salida .= "<input type='text' class='form-control' value='$fila[3]' disabled>";
            $salida .= "<input type='file' class='form-control' id='foto_perfil' onchange='mostrarImagen(event,$des)' ";
            $salida .= "</div>";
            $salida .= "<div class='mb-3'>";
            $salida .= "<button type='button' class='btn btn-primary' onclick='editarDatos()'>Editar datos</button>";
            $salida .= "<button type='button' class='btn btn-secondary ms-2' id='boton_correo'>Cambiar correo</button>";
            $salida .= "<button type='button' class='btn btn-secondary ms-2' id='boton_contraseña'>Cambiar contraseña</button>";
            $salida .= "<button type='button' class='btn btn-secondary ms-2' id='delete_img' onclick='eliminarFoto()'>Eliminar foto</button>";
            $salida .= "</div>";
            $salida .= "</div>";
            $salida .= "</div>";
            $salida .= "</div>";
        }
        return $salida; 
    }

    public static function mostrarCategorias($des){
        include_once("modelo.php");
        $salida = "";
        $consulta = Model::sqlMostrarCategorias();
        while($fila = $consulta->fetch_array()){
            if($des == 1){
                $salida .= "<li><a class='dropdown-item' href='ddm.php?seccion=categorias&cate=$fila[1]'>$fila[1]</a></li>";
            }
            if($des == 2){
                $salida .= "<input type=checkbox  name=categoria$fila[0] value=$fila[0] >$fila[1] <br>";
            }
        }
        return $salida;
    }

    

}    