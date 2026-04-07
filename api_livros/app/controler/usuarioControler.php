<?php

require_once __DIR__ . '/../model/usuarioModel.php'; 
require_once __DIR__ . '/../view/usuarioView.php';

class UsuarioControler {
    private $modelUsuario;
    private $viewUsuario;

    public function __construct($db){
        // Manipular informações no DB através do Model
        $this->modelUsuario = new UsuarioModel($db);

        // Criar os elementos para resposta ao usuário final através da View
        $this->viewUsuario = new UsuarioView();
    }

    public function loginUsuario(){
        // Capturando email e senha do corpo da requisição (JSON --> Array)
        $data = json_decode(file_get_contents("php://input"), true);

        // Verifica se os campos obrigatórios existem no JSON recebido
        if (isset($data['email']) && isset($data['senha'])) {
            
            // Solicita ao Model que verifique as credenciais
            $usuario = $this->modelUsuario->loginUser($data['email'], $data['senha']);

            if ($usuario) {
                // Se encontrar o usuário, envia os dados com status 200 (OK)
                $this->viewUsuario->sendResponse($usuario, 200);
            } else {
                // Se as credenciais estiverem erradas, status 401 (Não autorizado)
                $this->viewUsuario->sendResponse(['message' => 'E-mail ou senha incorretos'], 401);
            }

        } else {
            // Se faltarem dados na requisição, status 400 (Bad Request)
            // Corrigido: Adicionado $this-> e ajustado o nome do método
            $this->viewUsuario->sendResponse(['message' => 'Dados de login inválidos ou incompletos'], 400);
        }
    }
}

?>