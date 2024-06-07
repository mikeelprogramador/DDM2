<?php

  $seccion = "home"; 
  

  if( isset( $_GET[ 'seccion' ] ) ){
    $seccion = $_GET[ 'seccion' ];
  }


include( "navbar-user.php" ); 