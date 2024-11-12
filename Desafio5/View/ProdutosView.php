<?php 

$pdo = new PDO('mysql:host=localhost;dbname=gerenciador_produtos', 'root', '');

$sql = "SELECT * FROM produtos";
$stmt = $pdo->query($sql);

if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div>";
        echo "<h2>" . $row['titulo'] . "</h2>";
        echo "<p>Preço: $" . $row['preco'] . "</p>";
        echo "<p>Descrição: " . $row['descricao'] . "</p>";
        echo "<p>Categoria: " . $row['categoria'] . "</p>";
        echo "<img src='" . $row['imagem'] . "' alt='Imagem do produto' style='width: 300px;'>";
        echo "<p>Avaliação: " . $row['avaliacao'] . "</p>";
        echo "</div>";
    }
} else {
    echo "Nenhum produto encontrado.";
}

?>