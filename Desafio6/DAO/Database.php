<?php

require("Config/Config.php");

class Database{

    private static $instance = null;
    private $pdo;

    public function __construct()
    {
        try{
            $this->pdo = new PDO('mysql:host=' . Config::DB_HOST . ";dbname=" . Config::DB_NAME, Config::DB_USER, Config::DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo 'Conexão bem sucedida!';
        } catch (PDOException $e){
            throw new Exception("Erro ao conectar ao banco!" . $e->getMessage());
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