<?php

require('./DAO/ProdutosDAO.php');

class Controller
{
    private $produtoDAO;

    public function __construct()
    {
        $this->produtoDAO = new ProdutosDAO;
    }

    public function operacaoProduto()
    {
        if (isset($_POST['produtos'])) {
            $resultado = $this->produtoDAO->retornarProdutos();
            return $resultado;
        } elseif(isset($_POST['id']) && !isset($_POST['id'])) {
            $id = $_POST['id'];
            $resultado = $this->produtoDAO->retornarProdutosPorId($id);
            return $resultado;
        } elseif(isset($_POST['adicionar'])){
            $resultado = $this->produtoDAO->adicionarProduto();
            return $resultado;
        } elseif(isset($_POST['deletar']) && isset($_POST['id'])){
            $id = $_POST['id'];
            $resultado = $this->produtoDAO->deletarProduto($id);
            return $resultado;
        } elseif(isset($_POST['atualizar']) && isset($_POST['id'])){
            $id = $_POST['id'];
            $resultado = $this->produtoDAO->atualizarProduto($id);
            return $resultado;
        } else {
            return ['error' => 'nenhum produto com o id especificado!'];
        }
    }
}
