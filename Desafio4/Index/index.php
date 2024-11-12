<?php 

require_once __DIR__ . '/../Controller/WeatherController.php';
require_once __DIR__ . '/../Models/Tratamento.php';
require_once __DIR__ . '/../Models/WeatherDB.php';

include('../Database/CreateDatabse.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
    $cidade = isset($_POST['city_name']) ? $_POST['city_name'] : '';
    //$cidade = str_replace(' ', '%20', $cidade);

    if (!empty($cidade)) {
        $controller = new WeatherController();
        $climaJson = $controller->getClima($cidade);

        $climaTratado = new Tratamento();
        $respostaClima = $climaTratado->tratamentoDados($climaJson);

        $climaDB = new WeatherDB();
        $climaDB->salvarClima($respostaClima);
        
        if ($respostaClima && $climaDB) {
            print_r($respostaClima);
            echo 'deu certo!';
        } else {
            echo "Erro ao obter dados do clima.";
        }
    } else {
        echo "Por favor, forneça o nome da cidade.";
    }
}

?>