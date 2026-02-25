<?php
require_once 'bd.php';

try {   
    $database = new Database();
    
    $db = $database->getConnection(); 

    if ($db) {
        echo "Sucesso: A ponte com o banco de dados funcionou";
    }
} catch (Exception $e) {
    echo "Erro inesperado: " . $e->getMessage();
}
?>