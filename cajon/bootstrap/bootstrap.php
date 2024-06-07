<?php
class estilo{

    private $menssage;
    private $nowMenssage;

    public function __construct($texto) {
        $this->menssage = $texto;
        estilo::cambio();
    }

    private function cambio(){
       $this-> nowMenssage = password_hash($this->menssage,PASSWORD_DEFAULT);
       $this-> menssage = "";
    }
    public function imprimir(){
        return $this->nowMenssage;
    }
    private function verificar($texto,$base){
        return password_verify($texto,$base);
    }

    public function texto($texto1,$texto2){
        return $this->verificar($texto1,$texto2);
    }
}
class id{

    public static function encriptar($dato) {
        return base64_encode($dato);
    }
    
    public static function desencriptar($dato) {
        return base64_decode($dato);
    }

}