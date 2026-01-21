<?php

declare(strict_types=1);

namespace Joaopaulo\projetoestoque;

use PDO;
use PDOException;
use Dotenv\Dotenv;

//Classe Conexão
class Conexao
{
    private static $instance;

    public static function getConexao()
    {
        if (!isset(self::$instance)) {
            $dotenv = Dotenv::createImmutable(__DIR__ . "/..");
            $dotenv->safeLoad();

            $host = $_ENV['DB_HOST'];
            $dbname = $_ENV['DB_NAME'];
            $user = $_ENV['DB_USER'];
            $pass = $_ENV['DB_PASS'];
            $charset = $_ENV['DB_CHARSET'];

            try {
                self::$instance = new PDO(
                    "mysql:host={$host};dbname={$dbname};charset={$charset}",
                    $user,
                    $pass
                );
                self::$instance->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
            } catch (PDOException $e) {
                die("Erro na conexão: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
