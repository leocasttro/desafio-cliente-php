<?php

require 'config/config.php';

$config = require 'config/config.php';

try {
    $pdo = new PDO(
        "pgsql:host={$config['DB_HOST']};dbname={$config['DB_NAME']}",
        $config['DB_USER'],
        $config['DB_PASS']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "✅ Conexão bem-sucedida com o banco de dados!";
} catch (PDOException $e) {
    echo "❌ Erro ao conectar: " . $e->getMessage();
}
