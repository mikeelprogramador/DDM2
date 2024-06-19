<?php 

include_once("../../metodos/clas-view.php");
include_once("../../metodos/clas-producto.php");
//Vista administrador de los productos
if(isset($_GET['search'])){
    echo Vista::buscarProducto($_GET['search']);
}
//Vista general de los productos
if(isset($_GET['busquedaGeneral'])){
    echo Vista::mostrarProductos($_GET['busquedaGeneral']);
}
//Desicion para eliminar un producto
if( isset($_GET['id']) ){
    echo cargarProducto::eliminarProducto($_GET['id']);
}
//Formulario para cargar productos
if(isset($_POST['enviar'])){
  
    $id = $_POST['id-pro'];
    $nombre = $_POST['name-pro'];
    $descrip = $_POST['descrip-pro'];
    $caracter = $_POST['caracter-pro'];
    $color = $_POST['color-pro'];
    $cantidad = $_POST['cantidad-pro'];
    $ofertas = $_POST['oferta-pro'];
    if($_POST['precio-pro'] > 0){
      $precio = number_format($_POST['precio-pro'], 2, ',', '.');
    }else{
      $precio = 0;
    }
  
    if(isset($_FILES['card-img'])){
      $files =  $_FILES['card-img'];
      $img  = cargarProducto::img($files);
      if( $img == "0" ){
        header("location: admin.php?men=img".$img."&seccion=seccion-ag-pro");
      }if( $img == "1" ){
        header("location: admin.php?men=img".$img."&seccion=seccion-ag-pro");
      }
    } 
    if( $img != "0" || $img !="1" ){
      if(  !empty($_FILES['card-img']) && $id != "" && $nombre != "" ){
        $nowProducto = cargarProducto::cargarProducto($id,$nombre,$descrip,$caracter,$cantidad,$ofertas,$img,$precio,$color);
        if( $nowProducto == 0 ){
          header("location: admin.php?men=".$nowProducto."&seccion=seccion-ag-pro");
        }if( $nowProducto == 1 ){
          header("location: admin.php?men=".$nowProducto."&seccion=seccion-ag-pro");
        }if( $nowProducto == 2 ){
          header("location: admin.php?men=".$nowProducto."&seccion=seccion-ag-pro");
        }
      }else {
        header("location: admin.php?men=2&seccion=seccion-ag-pro");
      }
    } 
  }