<?php

// 1. Configurações de erro (Crucial para o desenvolvedor)
error_reporting(E_ALL); 
ini_set('display_errors', 1); 

// 2. Cabeçalho para JSON e CORS (Comunicação com o Front-end)
header('Content-Type: application/json; charset=utf-8');

// Define a origem para permitir que o JavaScript acesse a API
$origin = $_SERVER['HTTP_ORIGIN'] ?? '*'; 
header('Access-Control-Allow-Origin: ' . $origin);
header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

// Resposta para requisições de pré-fluxo (Preflight) do navegador
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit; 
}

// 3. Importação de arquivos base
require_once '../config/db.php';
require_once '../app/controler/usuarioControler.php';

// Inicializa a conexão com o banco
$database = new database(); 
$db = $database->getConnection();

// 4. Sistema de Rotas
// Pegamos a URL atual e limpamos para saber qual ação o usuário quer
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$route = basename($path); 
$method = $_SERVER['REQUEST_METHOD'];

try {
    switch ($route) {
        case 'health':
            http_response_code(200);
            echo json_encode(['status' => 'Ok - Sistema Online!']);
            break;

        case 'login': 
            if ($method === 'POST') {
                $controller = new UsuarioControler($db);
                $controller->loginUsuario();
            } else {
                http_response_code(405);
                echo json_encode(['error' => 'Método não permitido']);
            }
            break;

        default:
            http_response_code(404);
            echo json_encode(['error' => 'Rota não encontrada']);
            break;
    }
} catch (Throwable $e) {
    // Caso aconteça qualquer erro grave no servidor
    http_response_code(500);
    echo json_encode([
        'error' => 'Erro interno de servidor',
        'detalhe' => $e->getMessage()
    ]);
}

?>