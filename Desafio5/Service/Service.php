<?php 

class Service{

    public function __construct()
    {
        $path = "../Images";

        if (!is_dir($path)) {
            if (!mkdir($path, 0777, true)) {
                throw new Exception("Falha ao criar a pasta 'Images'.");
            }
        }
    }

    public function refatorarImagem($base64, $titulo)
    {
        $destinoPasta = "./Images";

        $infoArquivo = explode(",", $base64);
        $conteudoDecode = base64_decode($infoArquivo[1]);
        $dataArquivo = explode(';', $infoArquivo[0]);
        $extensaoArquivo = explode('/', $dataArquivo[0]); 
        $novoNome = $titulo . '.' . $extensaoArquivo[1];
        $novoCaminho = $destinoPasta . '/' . $novoNome;

        file_put_contents($novoCaminho, $conteudoDecode);
        return $novoCaminho;
    }
}



?>