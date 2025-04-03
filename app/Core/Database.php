<?php

namespace App\Core;

use PDO;
use PDOException;

class Database 
{
    private static $instance = null;

    public static function getConnection(): PDO 
    {
        if (self::$instance === null) {
            try {
                $configPath = __DIR__ . '/../../config/config.ini';
                if (!file_exists($configPath)) {
                    die(json_encode(["error" => "Arquivo de configuração não encontrado: " . $configPath]));
                }

                $config = parse_ini_file($configPath);
                
                if (!$config || !isset($config['DB_HOST'], $config['DB_NAME'], $config['DB_USER'], $config['DB_PASS'])) {
                    die(json_encode(["error" => "Erro ao carregar configurações do banco de dados."]));
                }

                self::$instance = new PDO(
                    "pgsql:host={$config['DB_HOST']};dbname={$config['DB_NAME']}",
                    $config['DB_USER'],
                    $config['DB_PASS']
                );

                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                die(json_encode(["error" => "Erro de conexão: " . $e->getMessage()]));
            }
        }
        return self::$instance;
    }
}
