<?php

declare(strict_types=1);

require (__DIR__) . '/../vendor/autoload.php';


use Joaopaulo\projetoestoque\Produto;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nomeProduto = trim($_POST['nomeProduto'] ?? '');
   
    if ($nomeProduto === '') {
        // Nenhum produto informado 
        $_SESSION['mensagem'] = "⚠️ Nenhum produto informado!";
        $_SESSION['tipo'] = "warning";
        header("Location: formulario_registro.php");
        die();
    }

    $produto = new Produto($nomeProduto);

    if ($produto->salvar()) {
        $_SESSION['mensagem'] = "✅ Produto cadastrado com sucesso!";
        $_SESSION['tipo'] = "success";
    } else {

        $_SESSION['mensagem'] = "⚠️ Esse nome já foi registrado!"; $_SESSION['tipo'] = "warning";


        //$_SESSION['mensagem'] = "❌ Erro ao cadastrar produto!";
        //$_SESSION['tipo'] = "danger";
    }
    header("Location: formulario_registro.php");
    die();
}
