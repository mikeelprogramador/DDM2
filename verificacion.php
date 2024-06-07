<?php
include("metodos/clas-login.php");
$ban = $_GET['log'];
$email = $_POST['email'];
$password = $_POST['clave'];
if($ban == 1){
    $inicoSesion = Login::inicio($email,$password);
    if( $inicoSesion == 0 ){
        echo "Ups ocurrio un error al momento de verificar los datos, intenta más tarde";
    }else if( $inicoSesion ==-1 ){
        echo "La contraseña o el correo no conside intenta nuevamente";
    }
}
if($ban == 0){
    $nombre = $_POST['nom'];
    $apellido = $_POST['apellido'];
    $registro = Login::registrar($nombre,$apellido,$email,$password);
    if( $registro == 0){
        echo "Ups ah ocurrido un erro al crear el usuario, verifca que los datos sean correctos";
    } else if( $registro == -1 ){
        echo "Estos datos ya le pertenecen a un usuario, verifica nuevamente";
    }
}