<?php
declare(strict_types=1);

namespace Joaopaulo\projetoestoque;

use PDO; 
use PDOException; 

class Produto { 
    private string $nome; 
    public function __construct(string $nome) { 
        $this->nome = $nome; 
    } 
    
    /** * Verifica se o produto já existe no banco */ 
    private function existe(): bool { 
        $con = Conexao::getConexao(); 
        $sql = "SELECT COUNT(*) FROM registro_produto WHERE nome = :nome"; $stmt = $con->prepare($sql); 
        $stmt->bindValue(":nome", $this->nome); 
        $stmt->execute(); 
        return $stmt->fetchColumn() > 0; 
    } 
    
    /** * Salva o produto no banco, evitando duplicidade */ 
    public function salvar(): bool 
    { $con = Conexao::getConexao(); 
        // ✅ Primeiro verifica se já existe 
        if ($this->existe()) { 
            // Retorna false para indicar que não foi salvo 
            // (pois já existe) 
            return false; 
        } 
        try { 
            $sql = "INSERT INTO registro_produto (nome) VALUES (:nome)"; 
            $stmt = $con->prepare($sql); 
            $stmt->bindValue(":nome", $this->nome); 
            return 
            $stmt->execute(); 
        } catch (PDOException $e) { 
            // Se for erro de duplicidade (SQLSTATE 23000) 
            if ($e->getCode() === "23000") { 
                return false; 
            } 
            throw $e; // outros erros são lançados 
            } 
        } 
    }