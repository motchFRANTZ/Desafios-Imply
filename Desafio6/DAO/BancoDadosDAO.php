<?php

require("Database.php");

class BancoDadosDAO{

    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConexao();
    }

    public function retornarEmailLogin($email){
        // Vai verificar no banco se tem algum usuário com aquele email e retornar verdadeiro se tiver

        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email=:email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);     
    }
}

?>