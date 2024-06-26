<?php
include_once("../../metodos/clas-view.php");
include_once("../../metodos/clas-verific.php");
include_once("../../cajon/bootstrap/bootstrap.php");

if(! isset( $_SESSION))session_start();
if( isset($_GET['http'])){
    if($_SESSION['token'] != $_GET['http'] ){
       header("location: error.php");
       
    }
}
$seccion = "producto";
include($seccion.".php");
