<?php 

class UsuarioModel {
    private $db;

    // O construtor recebe a conexão PDO do banco de dados
    public function __construct($db){
        $this->db = $db; 
    }

    /**
     * Busca um usuário pelas credenciais
     * @param string $email
     * @param string $senha
     * @return array|false Retorna os dados do usuário ou false se não encontrar
     */
    public function loginUser($email, $senha){
    // Alterado: removi o 'id' e 'nome' que podiam não existir
    // Vamos buscar '*' (tudo) para garantir que funcione primeiro
    $stmt = $this->db->prepare("
        SELECT * FROM usuarios2 
        WHERE email = :email AND senha = :senha
        LIMIT 1
    ");

    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':senha', $senha);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
        
}

?>