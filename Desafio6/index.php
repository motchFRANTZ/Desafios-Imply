<?php

require("Controller/Controller.php");

if($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['login']){

    // Deve ser o método POST pois deve fazer o login primeiro
    echo "Controller chamado!";
    $controller = new Controller();
    $info = $controller->fazerLogin();
    echo($info);
}

?>