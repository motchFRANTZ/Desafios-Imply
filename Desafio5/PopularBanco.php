<?php

$conn = new mysqli('localhost', 'root', '', 'gerenciador_produtos');

$infoJson = file_get_contents('https://fakestoreapi.com/products');
$info = json_decode($infoJson);

foreach($info as $value){
    $titulo = $conn->real_escape_string($value->title);
    $preco = $conn->real_escape_string($value->price);
    $descricao =  $conn->real_escape_string($value->description);
    $categoria = $conn->real_escape_string($value->category);
    $imagem = $conn->real_escape_string($value->image);
    $avaliacao = $conn->real_escape_string($value->rating->rate);

    $sql = "INSERT INTO produtos (titulo, preco, descricao, categoria, imagem, avaliacao) VALUES ('$titulo', '$preco', '$descricao', '$categoria', '$imagem', '$avaliacao')";
    if(!$conn->query($sql)){
        echo "erro!" . $conn->error;
        echo "<br>";
    } 
}

?>