<?php 

class Weather {

    private $apiKey = "5f7a2c5af87b5612fefd1081adf6d89b";

    public function getClima($cidade) {
        $cidade = urlencode($cidade);
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$cidade}&appid={$this->apiKey}&lang=pt_br&units=metric";

        $response = file_get_contents($url);
        if ($response !== false) {
            return json_decode($response);
        } else {
            echo 'Erro ao acessar!';
            return false;
        }
    }
}