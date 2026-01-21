<?php
declare(strict_types=1);


require dirname(__DIR__) . '/vendor/autoload.php';

use Joaopaulo\ProjetoEstoque\Conexao;

try {
    $con = Conexao::getConexao();
    echo "<h3>Conexão Ok</h3>";
} catch (Exception $e) {
    echo "<h3>Sem conexão</h3>" . $e->getMessage();
}