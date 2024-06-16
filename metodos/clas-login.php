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
                $salida = 1;
            }else{
                $salida = 0;//Si ocuurio un error al momento de registrar a la persona
            }
        }else{
            $salida = -1;//Si los datos que la persoan ingreso ya existen
        }
        return $salida; 
    }
        

    public static function inicio($email,$password){
        include_once("modelo.php");
        include_once("cajon/bootstrap/bootstrap.php");
        $salida = 0;
        $clave = new estilo($password);
        $newPwd = Login::pwd($email);
        if($clave->texto($password,$newPwd)){
            $consulta = Model::sqlInicoSesion($email,$newPwd);
            while($fila= $consulta->fetch_array()){
                if( $fila[1] > 0 ){
                    $salida = 1;
                    if( $fila[0] == "0user"){
                        $salida = 2; 
                    }
                }else{
                    $saldia = 0;// si ocurre un error al momenro de veridcar los datos
                }
            }
        }else{
            $salida = -1;// si la contraseña no es la misma que esta en la base de datos
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

    private static function encontarUsuario($email){
        include_once("modelo.php");
        $salida = 0;
        $consulta = Model::sqlUsuario($email,"ven");
        while($fila= $consulta->fetch_array()){
            $salida .= $fila[0];
        }
        return $salida;
    }

    public static function buscarId($email){
        include_once("modelo.php");
        $salida = 0; 
        $consulta = Model::sqlUsuario($email);
        while($fila=$consulta->fetch_array()){
            $salida += $fila['id'];
        }
        return $salida;
    }


}
