<?php
declare(strict_types=1);

require (__DIR__) . '/../vendor/autoload.php';

use Joaopaulo\projetoestoque\Produto;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeProduto = $_POST['nomeProduto'] ?? null;

    if($nomeProduto){
        $produto = new Produto($nomeProduto);

        if($produto->salvar()){
            echo "Registro realizado com sucesso!";
        } else {
            echo "Falha no registro";
        }
    } else {
        echo "Nenhum produto informado";
    }
}