<?php

require_once '../model/UsuarioModel.php';

require_once '../view/UsuarioView.php';

class UsuarioControler {
    private $modelUsuario;
    private $viewUsuario;

    public function __construct($db){
        //manipiular informaçoes noDB
       $this -> modelUsuario = new UsuarioModel($db);

       // criar os elementos para usuario final
        $this -> viewUsuario = new UsuarioView();
    }

    public function loginUsuario(){
        //capturando email e senha do arquivo JSON (Json --> Array)
       $data = json_decode(file_get_contents("php://input") , true);
       if (isset($data['email']) && isset($data ['senha'])) {
        $usuario = $this->modelUsuario->loginUser($data['email'], $data['senha']);

        // chamar View passando resultado de model e HTTP RESPONSE 
        $this-> viewUsuario->sendResponse($usuario, 200);

       } else {
            viewUsuario->sendresponse('message'=> 'Login Invalido' , 400);
       }
    }
}

?>