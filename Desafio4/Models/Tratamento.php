<?php 

class Tratamento{

    public function tratamentoDados($dados){
        $informacoes = [
            'local' => $dados->name,
            'temperatura' => $dados->main->temp,
            'umidade' => $dados->main->humidity,
            'velocidade_vento' => $dados->wind->speed,
            'sensacao_termica' => $dados->main->feels_like,
            'tempo' => $dados->weather[0]->description,
        ];

        return $informacoes;
    }
}

?>