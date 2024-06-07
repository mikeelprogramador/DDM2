<?php

  $seccion = "seccion1"; //Sección por defecto.

  if( isset( $_GET[ 'seccion' ] ) ){
    $seccion = $_GET[ 'seccion' ];
  }

  //echo $seccion;

  include( "nav-adm.php" );
  include_once("../../metodos/clas-producto.php");

if(isset($_POST['enviar'])){
  
  $id = $_POST['id-pro'];
  $nombre = $_POST['name-pro'];
  $descrip = $_POST['descrip-pro'];
  $caracter = $_POST['caracter-pro'];
  $color = $_POST['color-pro'];
  $cantidad = $_POST['cantidad-pro'];
  $ofertas = $_POST['oferta-pro'];
  $precio = $_POST['precio-pro']; 
  $img = '';

  if(isset($_FILES["card-img"])){
    $filas =  $_FILES["card-img"];
    $img  = cargarProducto::img($filas);
  }
  $nowProducto = cargarProducto::cargarProducto($id,$nombre,$descrip,$caracter,$color,$cantidad,$ofertas,$img,$precio);
  if( $nowProducto == 0 ){
    echo "El codigo de este producto ya se encuntra creado";
  }if( $nowProducto == 1 ){
    echo "El producto se ha cardo exitosamente";
  }if( $nowProducto == 2 ){
    echo "Hubo un error al subir el archivo";
  }
  
}