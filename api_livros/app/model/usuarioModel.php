<?php 

class UsuarioModel {
    private $db;
    public function __construct($db){
        $this->db= $db

    }
    public function loginUser(){
        //receber email e senha decodificado do Json
        $stmt = $this->db->prepare("
            select * from usuarios2 
            where email = "Gabrielly@empresa.com" AND senha = 1234;

        ");

    }
}

?>