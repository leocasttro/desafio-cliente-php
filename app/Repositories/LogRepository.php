<?php

namespace App\Repositories;

use App\Core\Database;
use App\Interfaces\LogModelInterface;
use PDO;
use PDOException;

class LogRepository
{
    private PDO $conn;

    public function __construct() 
    {
        $this->conn = Database::getConnection();
    }

    public function salvarLog(LogModelInterface $data): bool
    {
        try {
            $stmt = $this->conn->prepare(
                "INSERT INTO logs 
                (url, response_body, status_code, created_at) 
                VALUES 
                (:url, :responseBody, :statusCode, :createdAt)");
            
            $stmt->execute([
                ':url' => $data->getUrl(),
                ':responseBody' => $data->getResponseBody(),
                ':statusCode' => $data->getStatusCode(),
                ':createdAt' => $data->getCreatedAt()->format('Y-m-d H:i:s')
            ]);
    
            return true;
        } catch (PDOException $e) {
            throw new \RuntimeException("Erro ao salvar log: " . $e->getMessage());
        }
    }
}
