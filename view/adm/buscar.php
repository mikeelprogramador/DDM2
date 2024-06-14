<?php 

include_once("../../metodos/clas-view.php");
include_once("../../metodos/clas-producto.php");
if(isset($_GET['search'])){
    echo Vista::buscarProducto($_GET['search']);
}

if(isset($_GET['busquedaGeneral'])){
    echo Vista::mostrarProductos($_GET['busquedaGeneral']);
}
if( isset($_GET['id']) ){
    echo cargarProducto::eliminarProducto($_GET['id']);
}