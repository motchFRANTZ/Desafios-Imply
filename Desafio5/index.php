<?php

require("Controller/Controller.php");


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $controller = new Controller();
    if($controller){
        echo "Controler Chamado!";
        $info = $controller->operacaoProduto();
        echo json_encode($info);
    }
}

?>