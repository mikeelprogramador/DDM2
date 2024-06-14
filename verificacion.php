<?php
include("metodos/clas-login.php");
if( ! isset($_SESSION)) session_start();
if( ! isset($_SESISION['id'])) $_SESSION['id'] = "";

if( isset($_GET['log'])){

    $email = $_POST['email'];
    $password = $_POST['clave'];
    $id = Login::buscarId($email);

    if ( $_GET['log'] == 1){// Si log es 1 inicia session
        $login = Login::inicio($email,$password);
        echo $login; 
        if( $login == 1){
            $_SESSION['id'] = $id;
            header("location: view/user/ddm.php?");
        }
        if( $login == 0 ){
            echo "Ups ocurrio un error al momento de verificar los datos, intenta más tarde";
        }
        if(  $login == -1 ){
            echo "La contraseña o el correo no conside intenta nuevamente";
        }
        if( $login == 2 ){
            $_SESSION['id'] = $id;
            header("location: view/adm/admin.php?");
        }
    }
    else{

        $nombre = $_POST['nom'];
        $apellido = $_POST['apellido'];
        $registro = Login::registrar($nombre,$apellido,$email,$password);
        if( $registro == 1 ){
            $_SESSION['id'] = $id;
            header("location: view/user/ddm.php?");
        }
        if( $registro == 0){
            echo "Ups ah ocurrido un erro al crear el usuario, verifca que los datos sean correctos";
        }
        if( $registro == -1 ){
            echo "Estos datos ya le pertenecen a un usuario, verifica nuevamente";
        }
    }
}
