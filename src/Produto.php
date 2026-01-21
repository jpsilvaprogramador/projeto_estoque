<?php
declare(strict_types=1);

namespace Joaopaulo\projetoestoque;

class Produto {
    private $nome;

    public function __construct($nome)
    {
        $this->nome = $nome;
    }

    public function salvar() {
        $con = Conexao::getConexao();
        $sql = "INSERT INTO registro_produto (nome) VALUES (:nome)";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":nome", $this->nome);
        return $stmt->execute();
    }
}