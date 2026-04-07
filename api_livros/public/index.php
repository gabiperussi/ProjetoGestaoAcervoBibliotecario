<?php

//configurações de error
error_reporting(E_ALL)
ini_set('display_erros', 1);

//cabeçalho para o Json
header('Content-Type: Application/json; charsert=utf-8');
$origin = $_SERVER['HTTP_ORIGIN']?? 'http://127.0.0.1:80'; //API recebe requisição de qualquer
header('Access-Control-Allow-Origin:'. $origin);
header('Acess-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
header('Acess-Control-Allow-Headers: Content-Type, Autorization, X-requested-With');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
    http_response_code(204);
    exist;
}


// Importação de códigos
require_once '../config/db.php';
require_once '../app/Controller/UsuarioControler.php';

$database = new DataBase();
$db =$database->getConnection();

//recuperar URL, configuração de rota
$path = parse_url($_SERVER['Request_URL'], PHP_URL);
$routher = basename($path);
$method = $_SERVER['REQUEST_METHOD']

try {
    switch ($route){
        case 'health'
            echo json_encode([
                'status' => 'Ok - Sistema Online!'
            ]);
            http_response_code(200);
        case 'login': 
            if ($method === 'POST'){

                UsuarioControler = new UsuarioControler($db);
             
        }

    }
} catch (thrwable $e) {
            http_response_code(500);
            echo Json_encode(['error' => 'erro interno de servidor',
            'detalhe'=> '$e->getMessage()'
            ])
}


?>