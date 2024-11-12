<?php

$servername = "localhost"; 
$dbname = "gerenciador_climas"; 
$user = "root"; 
$pass = ""; 

try {
    $pdo = new PDO("mysql:host=$servername", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql_create_database = "CREATE DATABASE IF NOT EXISTS $dbname";
    $pdo->exec($sql_create_database);
    
    $pdo->exec("USE $dbname");
    
    $sql_create_table = "CREATE TABLE IF NOT EXISTS historico (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        local VARCHAR(150) NOT NULL,
        temperatura FLOAT NOT NULL,
        umidade FLOAT NOT NULL,
        velocidade_vento FLOAT NOT NULL,
        sensacao_termica FLOAT NOT NULL,
        tempo VARCHAR(150) NOT NULL,
        ultima_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql_create_table);
    
    echo "Conexão bem-sucedida e tabela criada com sucesso!";
} catch(PDOException $e) {
    echo "Erro ao conectar ou criar tabela: " . $e->getMessage();
}

?>
