<?php 
    # -- Conexão com o banco de dados
    $servername = "db";
    $user = "root";
    $password = "root";
    $dbname = "gerenciador_tarefas";

    $conn = new mysqli($servername, $user, $password, $dbname);

    if($conn->connect_error){
        die($conn->error);
    } else {
        echo "Conexão feita!";
    }

    # Criando banco de dados

    $sql = "CREATE DATABASE IF NOT EXISTS gerenciador_tarefas";

    if($conn->query($sql)){
        echo "Banco criado com sucesso!";
    }

    # Criando tabelas do banco de dados "gerenciador_tarefas"
    $conn = new mysqli($servername, $user, $password, $dbname);
    $sql = "CREATE TABLE IF NOT EXISTS tarefas(
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(50) NOT NULL,
        descricao TEXT,
        status ENUM('pendente', 'em andamento', 'concluida') DEFAULT 'pendente'
        )";

    if($conn->query($sql)){
        echo "Tabela criada com sucesso!";
    }

    //header("Content-Type: application/json");

    # Pronto, conexão criada, agora vamos ver o que temos que fazer
    # GET/tarefas -> deve retornar todas as tarefas
    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['tarefas']) && !isset($_GET['id'])){
        $sql = "SELECT * FROM tarefas";

        $resultado = $conn->query($sql);

        if($resultado->num_rows > 0){
            // tem algo na tabela
            $tarefas = [];
            while($row = $resultado->fetch_assoc()){
                $tarefas[] = $row;
            } 

            echo json_encode($tarefas);
        } else {
            // Não tem info na tabela
            echo 'tabela vazia!'; 
        }
    }


    # GET/tarefas/[id] -> deve retornar a tarefa com o id especificado
    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['tarefas']) && isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM tarefas WHERE id = $id";

        $resultado = $conn->query($sql);

        if($resultado->num_rows > 0){
            // Encontrou a tarefa
            $tarefa = $resultado->fetch_assoc();
            echo json_encode($tarefa);
        } else {
            echo "Tarefa não encontrada!";
        }
    }
    # POST /tarefas - cria uma nova tarefa na base de dados
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['tarefas'])){
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];

        $sql = "INSERT INTO tarefas (titulo, descricao) VALUES ('$titulo', '$descricao')";
        echo "Entrou!";
        if($conn->query($sql)){
            //Inserido
            echo "Sucesso ao criar nova tarefa";
        } else {
            //Não inserido
            echo "Falha ao inserir nova tarefa!";
        }
    } 
    
    # PUT /tarefas/[id] - atualiza os dados da tarefa especificada;
    if($_SERVER['REQUEST_METHOD']==='PUT' && isset($_GET['tarefas']) && isset($_GET['id'])){
        $id = $_GET['id'];

        echo "<br>";
        $putdata = file_get_contents("php://input");
        echo $putdata;

        echo "<br>";
        parse_str($putdata, $data);
        echo parse_str($putdata, $data);

        $titulo = $conn->real_escape_string($data['titulo']);
        $descricao = $conn->real_escape_string($data['descricao']);

        $sql = "UPDATE tarefas SET titulo='$titulo', descricao='$descricao' WHERE id=$id";

        if($conn->query($sql)){
            // Atualizou
            echo "Atualizado com sucesso";
        } else {
            // Não atualizou
            echo "Erro ao atualizar";
        }


    }

    # DELETE /tarefas/[id] - Apaga a tarefa especificada;
    if($_SERVER['REQUEST_METHOD']==="DELETE" && isset($_GET['tarefas']) && isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM tarefas WHERE id=$id";

        if($conn->query($sql)){
            //Deletado
            echo "Sucesso ao deletar tarefa";
        } else {
            //Não deletado
            echo "Falha ao deletar tarefa!";
        }
    }

    

?>