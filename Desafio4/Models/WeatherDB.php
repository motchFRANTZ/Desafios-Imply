<?php 

class WeatherDB{

    private $pdo;

    public function __construct(){

        $dsn = 'mysql:host=localhost;dbname=gerenciador_climas';
        $user = 'root';
        $pass = '';

        try {
            $this->pdo = new PDO($dsn, $user, $pass);
        } catch (PDOException $e) {
            die('Erro ao conectar com o banco de dados: ' . $e->getMessage());
        }
        
    }

    public function salvarClima($dados){
        $sql = 'INSERT INTO historico (local, temperatura, umidade, velocidade_vento, sensacao_termica, tempo) VALUES 
        (:local, :temperatura, :umidade, :velocidade_vento, :sensacao_termica, :tempo)';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'local' => $dados['local'],
            'temperatura' => $dados['temperatura'],
            'umidade' => $dados['umidade'],
            'velocidade_vento' => $dados['velocidade_vento'],
            'sensacao_termica' => $dados['sensacao_termica'],
            'tempo' => $dados['tempo'],
        ]);

    }

}

?>