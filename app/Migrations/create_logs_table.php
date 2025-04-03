<?php
// app/Migrations/CreateLogsTable.php
namespace App\Migrations;

use App\Core\Database;
use PDOException;

class CreateLogsTable
{
    public static function up()
    {
        try {
            $pdo = Database::getConnection();

            $sql = "CREATE TABLE IF NOT EXISTS logs (
                id SERIAL PRIMARY KEY,
                url VARCHAR(255) NOT NULL,
                response_body VARCHAR(255) NOT NULL,
                status_code INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

            $pdo->exec($sql);
            echo "Migration aplicada: 'logs' criada.\n";
        } catch (PDOException $e) {
            echo "Erro ao executar a migration: " . $e->getMessage() . "\n";
        }
    }

    public static function down()
    {
        try {
            $pdo = Database::getConnection();
            $pdo->exec("DROP TABLE IF EXISTS logs");
            echo "Tabela 'logs' removida.\n";
        } catch (PDOException $e) {
            echo "Erro ao remover a tabela: " . $e->getMessage() . "\n";
        }
    }
}