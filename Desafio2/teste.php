<?php 

    // Criar um array com a sequência de Fibonnaci
    // Criar o array no alfabeto
    

    // $arrayAlfabeto = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

    // $split = str_split("abc");

    // print_r($split);

    // echo count($split);


    // function Fibonnacci(){
    //     $array = [];
    //     for($i=0; $i < 5; $i++){ // Itera sobre o array
    //         if($i < 2) {
    //             $array[$i] = $i;
    //         } else {
    //             $array[$i] = $array[$i - 1] + $array[$i - 2];
    //         }
    //     }
    //     print_r($array);
    // }
    
    // Fibonnacci();
    
    $str = readline("Digite as letras: ");
    $arrayStr = str_split($str);
    print_r($arrayStr);

    // foreach($arrayStr as $letra){
    //     echo $letra;
    // }


    /*
    Entrada: "abc"
    
    Para 'a' (1ª posição):
    Fibonacci(1) = 1
    Posição no alfabeto: 'a' é a 0ª letra (índice 0)
    Nova posição: (0 + 1) % 26 = 1
    Nova letra: 'b'
    
    Para 'b' (2ª posição):
    Fibonacci(2) = 1
    Posição no alfabeto: 'b' é a 1ª letra (índice 1)
    Nova posição: (1 + 1) % 26 = 2
    Nova letra: 'c'
    
    Para 'c' (3ª posição):
    Fibonacci(3) = 2
    Posição no alfabeto: 'c' é a 2ª letra (índice 2)
    Nova posição: (2 + 2) % 26 = 4
    Nova letra: 'e'
    
    Saída: "bce"*/
?>