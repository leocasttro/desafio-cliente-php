<?php
// migrate.php
require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Database;

function loadMigrationClass($className, $filePath) {
    if (!file_exists($filePath)) {
        echo "Arquivo não encontrado: $filePath\n";
        return false;
    }

    // Verifica se a classe já foi declarada
    if (!class_exists($className, false)) {
        require_once $filePath;
        
        if (!class_exists($className, false)) {
            echo "Classe $className não encontrada no arquivo $filePath\n";
            return false;
        }
    }
    return true;
}

$action = $argv[1] ?? 'up';
$migrationDir = __DIR__ . '/app/Migrations/';

// Lista explícita de migrations para evitar duplicações
$migrations = [
    'CreateClientesTable' => 'create_clientes_table.php',
    'CreateLogsTable' => 'create_logs_table.php'
];

$db = Database::getConnection();

foreach ($migrations as $className => $file) {
    $fullPath = $migrationDir . $file;
    $fullClassName = 'App\\Migrations\\' . $className;
    
    echo "Processando: $className... ";
    
    if (loadMigrationClass($fullClassName, $fullPath)) {
        try {
            if ($action === 'up') {
                $fullClassName::up();
                echo "UP executado\n";
            } elseif ($action === 'down') {
                $fullClassName::down();
                echo "DOWN executado\n";
            }
        } catch (Exception $e) {
            echo "ERRO: " . $e->getMessage() . "\n";
            exit(1);
        }
    } else {
        exit(1);
    }
}

echo "Todas as migrations foram processadas com sucesso!\n";
exit(0);