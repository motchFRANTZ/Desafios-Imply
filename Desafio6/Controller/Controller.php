<?php

require("./DAO/BancoDadosDAO.php");


class Controller{

    private $pedidosDAO;

    public function __construct()
    {
        $this->pedidosDAO = new BancoDadosDAO;
    }

    public function fazerLogin(){
        if(isset($_POST['email']) && isset($_POST['senha'])){
            $email = $_POST['email'];
            $senha = md5($_POST['senha']);

            // Deve acessar o banco para ver se tem um login com este email
            $emailBanco = $this->pedidosDAO->retornarEmailLogin($email);

            if(!$emailBanco){
                echo "email não encontrado!";
                exit();
            }

            if($emailBanco[0]['senha'] !== $senha){
                echo 'Senha incorreta!';
                exit();
            }
            
            $nome = $emailBanco[0]['user'];
        }
        return $nome;
    }
}
?>