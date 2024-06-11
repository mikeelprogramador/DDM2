<?php
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


include( "navbar-user.php" ); 