<?php 

    function calcularFibonacci($posLetra){
        $array = [];

        for($i=0; $i <= $posLetra; $i++){ // Itera sobre o array
            if($i < 2) {
                $array[$i] = $i;
            } else {
                $array[$i] = $array[$i - 1] + $array[$i - 2];
                }
            }
        $ultimoValor = count($array);
        return $array[$ultimoValor - 1];
    }

    function valorLetra($letra){
        $arrayAlfabeto = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

        return array_search($letra, $arrayAlfabeto);
    }  

    function separarLetras($str){
        $arrayLetras = str_split($str);
        return $arrayLetras;
    }

    function Descriptografando($numeroFibonnacci, $posLetra){
        $novoNumero = ($numeroFibonnacci + $posLetra) % 26;

        $novaLetra = NovaLetra($novoNumero);
        return $novaLetra;
    }

    function NovaLetra($novoNumero){
        $arrayAlfabeto = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

        $novaLetra = $arrayAlfabeto[$novoNumero];

        return $novaLetra;
    }

    function main(){
        $str = readline("Digite as letras: ");

        $arrayLetras = separarLetras($str);
        print_r($arrayLetras);
        $novaSequencia = "";
        foreach($arrayLetras as $key=>$letra){
            $posLetra = $key + 1;
            $indiceLetra = valorLetra($letra);   
            echo "A letra '{$letra}' tem a posição $posLetra e  indice  $indiceLetra";
            echo "\n";
            $numeroFibonnacci = calcularFibonacci($posLetra);
            echo $numeroFibonnacci;
            echo "\n";
            echo "\n";
            $letra = Descriptografando($numeroFibonnacci, $indiceLetra);
            $novaSequencia .= $letra;
        }
        echo $novaSequencia . "\n";

    } 

    main();

    
//         Para 'a' (1ª posição):
//         Fibonacci(1) = 1
//         Posição no alfabeto: 'a' é a 0ª letra (índice 0)
//         Nova posição: (0 + 1) % 26 = 1
//         Nova letra: 'b'
// ?>