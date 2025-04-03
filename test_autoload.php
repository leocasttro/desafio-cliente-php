<?php
// test_autoload.php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/Migrations/create_clientes_table.php';
require_once __DIR__ . '/app/Migrations/create_logs_table.php';

use App\Migrations\CreateClientesTable;
use App\Migrations\CreateLogsTable;

echo "Testando CreateClientesTable:\n";
var_dump(class_exists('App\Migrations\CreateClientesTable', false)); // false para não usar autoloader
echo "Testando CreateLogsTable:\n";
var_dump(class_exists('App\Migrations\CreateLogsTable', false));