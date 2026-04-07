<?php 

class UsuarioView {

   /**
    * Envia uma resposta JSON padronizada
    */
   public function sendResponse($data, $statuscode) {
      // Define o cabeçalho de conteúdo como JSON
      header('Content-Type: application/json; charset=utf-8');
      
      // Define o código de status HTTP (Ex: 200, 400, 401, 500)
      http_response_code($statuscode);
      
      // Transforma o array PHP em JSON e exibe na tela
      // JSON_UNESCAPED_UNICODE evita problemas com acentuação
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      
      // Encerra a execução para garantir que nada mais seja enviado
      exit;
   }
}

?>