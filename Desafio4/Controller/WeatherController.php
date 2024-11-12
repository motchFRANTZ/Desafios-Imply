<?php

require_once __DIR__ . '/../Models/Weather.php';
require_once __DIR__ . '/../Models/Tratamento.php';

class WeatherController {

    private $weather;

    public function __construct() {
        $this->weather = new Weather();
    }

    public function getClima($cidade) {
        return $this->weather->getClima($cidade);
    }

}

?>