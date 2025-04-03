<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Migrations/create_clientes_table.php';

use App\Migrations\CreateClientesTable;

$action = $argv[1] ?? 'up';

if ($action === 'up') {
    CreateClientesTable::up();
} elseif ($action === 'down') {
    CreateClientesTable::down();
} else {
    echo "Comando inválido. Use 'php migrate.php up' ou 'php migrate.php down'.\n";
}
