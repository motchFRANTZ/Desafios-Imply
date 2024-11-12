<?php

require('Database.php');
require('./Service/Service.php');

class ProdutosDAO
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConexao();
    }

    public function retornarProdutos()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM produtos');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function retornarProdutosPorId($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM produtos WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function adicionarProduto()
    {
        try {
            // Verifica se todos os dados necessários estão presentes
            if (!isset($_POST['titulo'], $_POST['preco'], $_POST['descricao'], $_POST['categoria'], $_POST['imagem'], $_POST['avaliacao'])) {
                throw new Exception("Faltam dados obrigatórios para a inserção do novo Produto!");
            }

            $titulo = $_POST['titulo'];
            $preco = $_POST['preco'];
            $descricao = $_POST['descricao'];
            $categoria = $_POST['categoria'];
            $imagemRecebida = new Service();// Deve passar o caminho da imagem para o banco
            $imagemCaminho = '.' . $imagemRecebida->refatorarImagem($_POST['imagem'], $_POST['titulo']);
            $avaliacao = $_POST['avaliacao'];

            $sql = "INSERT INTO produtos (titulo, preco, descricao, categoria, imagem, avaliacao) VALUES (:titulo,  :preco, :descricao, :categoria, :imagem, :avaliacao)";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':imagem', $imagemCaminho);
            $stmt->bindParam(':avaliacao', $avaliacao);

            if ($stmt->execute()) {
                return "Produto adicionado com sucesso!";
            } else {
                return "Erro ao adicionar produto!";
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function deletarProduto($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM produtos WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                return "Produto removido com sucesso!";
            } else {
                return "Erro ao remover produto: produto não foi encontrado!";
            }
        } else {
            return "Erro ao remover produto!";
        }
    }

    public function atualizarProduto($id)
    {
        $titulo = $_POST['titulo'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];
        $categoria = $_POST['categoria'];
        $imagem = $_POST['imagem'];
        $avaliacao = $_POST['avaliacao'];

        $sql = "UPDATE produtos SET titulo = :titulo, preco = :preco, descricao = :descricao, categoria = :categoria, imagem = :imagem, avaliacao = :avaliacao WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':imagem', $imagem);
        $stmt->bindParam(':avaliacao', $avaliacao);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "Produto atualizado com sucesso!";
        } else {
            return "Erro ao atualizar produto!";
        }
    }
}
