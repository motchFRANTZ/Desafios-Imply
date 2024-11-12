<?php

require('Utils/Utils.php');

class Database
{
    private static $instance = null;
    private $pdo;

    public function __construct()
    {
        try{
            $this->pdo = new PDO('mysql:host='. Config::DB_HOST, Config::DB_USER, Config::DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->pdo->exec("CREATE DATABASE IF NOT EXISTS " . Config::DB_NAME);
            echo "Banco de dados criado com sucesso ou já existente.<br>";

            $this->pdo->exec("USE " . Config::DB_NAME);

            $this->pdo->exec("CREATE TABLE IF NOT EXISTS produtos (
                id INT AUTO_INCREMENT PRIMARY KEY,
                titulo VARCHAR(255) NOT NULL,
                preco DECIMAL(10, 2) NOT NULL,
                descricao TEXT,
                categoria VARCHAR(100),
                imagem VARCHAR(255),
                avaliacao DECIMAL(3, 2)
            )");
            echo "Tabela produtos criada com sucesso ou já existente.<br>";
        }catch(PDOException $e){
            die('Falha ao se conectar ao banco de dados' . $e->getMessage());
        }
    }

    public static function getInstance(){
        if(self::$instance==null){
            self::$instance = new Database;
        }

        return self::$instance;
    }

    public function getConexao(){
        return $this->pdo;
    }
}

?>