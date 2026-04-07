<?php
class database {
    private $host = "localhost";
    private $dbname = "livro_db";
    private $username = "root";
    private $password = "12345678";
    private $pdo;

    
    public function __construct() { 
       
        try {
         
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
            
            $this->pdo = new PDO(
                $dsn, 
                $this->username, 
                $this->password, 
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } 
        catch (PDOException $error) {
          
            http_response_code(500);
            echo json_encode([
                "Error" => "Falha na conexão com o banco de dados", 
                "Detail" => $error->getMessage()
            ]);
            exit;
        } 
        
    }
    public function getConnection() {
        
        return $this->pdo;
    } 
} 
?>