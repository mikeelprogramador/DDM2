<?php 

include_once("../../metodos/clas-view.php");
if(isset($_GET['search'])){
    echo Vista::buscarProducto($_GET['search']);
}

if(isset($_GET['busquedaGeneral'])){
    echo Vista::mostrarProductos($_GET['busquedaGeneral']);
}
