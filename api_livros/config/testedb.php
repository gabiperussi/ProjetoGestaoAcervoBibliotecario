<?php
require_once 'bd.php';

try {   
    $database = new Database();
    $db = $database->getConnection(); 

    if ($db) {
        $stmt = $db->query("SELECT id_livro, titulo, autor FROM livros2");

        
        $livros = []; 

       
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $livros[] = $row; 
        }

        
        echo json_encode($livros, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); 
    }
} catch (Exception $e) {
    echo json_encode(["erro" => $e->getMessage()]);
}
?>