<?php
session_start();
include_once("../../cajon/bootstrap/bootstrap.php");
include_once("../../metodos/clas-user.php");
include_once("../../metodos/clas-view.php");
if( isset($_POST['agregarComentario']) && $_POST['agregarComentario'] == true ){
    $comentario = $_POST['comentario'];
    if( $comentario != ""){
        $id = id::desencriptar($_POST['data']);
        if( Productos::crearComentarios($comentario,$id,$_SESSION['id']) == 1){
            echo Vista::viewComentarios($id,$_SESSION['id']);
        }
    }
}
if( isset($_POST['eliminarComentario']) && $_POST['eliminarComentario'] == true ){
    $id_comen = $_POST['comen'];
    $id = id::desencriptar($_POST['data']);
    if( Productos::eliminarComentarios($id_comen,$_SESSION['id']) == 1){
        echo Vista::viewComentarios($id,$_SESSION['id']);
    }

}

