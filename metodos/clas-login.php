<?php

class Login {

    /**
     * Este metodo se encarga de registrara a los nuevos usuarios
     */
    public static function registrar($nombre,$apellido,$email,$password){
        include_once("cajon/bootstrap/bootstrap.php");
        include_once("modelo.php");
        $salida = 0;
        $estilo = new estilo($password);
        $newPwd = $estilo->imprimir();
        $id = Login::id();
        if( Login::encontarUsuario($email) == 0 ){
            $consulta = Model::sqlRegistarUsuario($id,$nombre,$apellido,$email,$newPwd);
            if($consulta){
                $caht = id::encriptar($id);
                header("location: view/user/ddm.php?caht=$caht");
            }else{
                $salida += 0;//Si ocuurio un error al momento de registrar a la persona
            }
        }else{
            $salida += -1;//Si los datos que la persoan ingreso ya existen
        }
        return $salida; 
    }
        

    public static function inicio($email,$password){
        include_once("modelo.php");
        include_once("cajon/bootstrap/bootstrap.php");
        $salida = 0;
        $estilo = new estilo($password);
        $newPwd = Login::pwd($email);
        if($estilo->texto($password,$newPwd)){
            $consulta = Model::sqlInicoSesion($email,$newPwd);
                if($consulta->num_rows > 0){
                    $id = Login::buscarId($email);
                    $caht = id::encriptar($id);
                    header("location: view/user/ddm.php?caht=$caht");
                }else{
                    $salida += 0;// si ocurre un error al momenro de veridcar los datos
                }
        }else{
            $salida += -1;// si la contraseña no es la misma que esta en la base de datos
        }
        return $salida;
    }

    private static function pwd($email){
        include_once("modelo.php");
        $salida = "";
        $consulta = Model::sqlUsuario($email);
        while($fila= $consulta->fetch_array()){
            $salida .= $fila[4];
        }
        return $salida; 
    }

    private static function id(){
        include_once("modelo.php");
        $salida = 0; 
        $consulta = Model::sqlId();
        while($fila=$consulta->fetch_array()){
            $salida += $fila[0]+1;
        }
        return $salida;
    }

    private static function encontarUsuario(){
        include_once("modelo.php");
        $salida = 0;
        $consulta = Model::sqlUsuario($email);
        while($fila= $consulta->fetch_array()){
            $salida .= $fila[0];
        }
        return $salida;
    }

    private static function buscarId($email){
        include_once("modelo.php");
        $salida = 0; 
        $consulta = Model::sqlUsuario($email);
        while($fila=$consulta->fetch_array()){
            $salida += $fila['id'];
        }
        return $salida;
    }


}
