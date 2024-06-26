<?php
session_start();
include_once("../../cajon/bootstrap/bootstrap.php");
include_once("../../metodos/clas-producto.php");
include_once("../../metodos/clas-view.php");
include_once("../../metodos/clas-verific.php");

if(isset($_FILES['foto_perfil'])){
    $files =  $_FILES['foto_perfil'] ;
    $img = Producto::img(2,$files);
    Verificaciones::cargarImagen($img,$_SESSION['id']);
    echo $img;
}