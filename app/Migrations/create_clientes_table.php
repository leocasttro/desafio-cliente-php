<?php
// app/Migrations/CreateClientesTable.php
namespace App\Migrations;

use App\Core\Database;
use PDOException;

class CreateClientesTable
{
    public static function up()
    {
        try {
            $pdo = Database::getConnection();

            $sql = "CREATE TABLE IF NOT EXISTS clientes (
                id SERIAL PRIMARY KEY,
                nome VARCHAR(255) NOT NULL,
                email VARCHAR(255) UNIQUE NOT NULL,
                telefone VARCHAR(20) NOT NULL,
                dataCadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                bairro VARCHAR(100) NOT NULL,
                cep VARCHAR(10) NOT NULL,
                cidade VARCHAR(100) NOT NULL,
                logradouro VARCHAR(255) NOT NULL,
                uf VARCHAR(2) NOT NULL
            )";

            $pdo->exec($sql);
            echo "Migration aplicada: 'clientes' criada.\n";
        } catch (PDOException $e) {
            echo "Erro ao executar a migration: " . $e->getMessage() . "\n";
        }
    }

    public static function down()
    {
        try {
            $pdo = Database::getConnection();
            $pdo->exec("DROP TABLE IF EXISTS clientes");
            echo "Tabela 'clientes' removida.\n";
        } catch (PDOException $e) {
            echo "Erro ao remover a tabela: " . $e->getMessage() . "\n";
        }
    }
}