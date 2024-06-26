<?php
  include_once("../../metodos/clas-verific.php");
  include_once("../../cajon/bootstrap/bootstrap.php");
  include_once("../../metodos/clas-view.php");
  if(! isset($_SESSION)) session_start();
  if(! isset($_SESSION['id'])){
    header("location: ../../index.php");
  }else{
    if($_SESSION['id'] == ""){
      header("location: ../../index.php");
    }
  }

  $seccion = "home"; 
  

  if( isset( $_GET[ 'seccion' ] ) ){
    $seccion = $_GET[ 'seccion' ];
  }
  if($seccion == "out"){
    Verificaciones::actualizarEstadoUser(2, $_SESSION['id']);
    session_destroy();
    setcookie(session_name(), "", time() - 3600, "/");
    header("location: ../../index.php");
  }else if( $seccion == "producto"){
    include("producto.php");
  }else{
    include( "navbar-user.php" );
  }
