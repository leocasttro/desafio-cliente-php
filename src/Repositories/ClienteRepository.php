<?php

namespace ClientesAPI\Repositories;

use ClientesAPI\Core\Database;
use PDO;

class ClienteRepository
{
    private PDO $conn;

    public function __construct() 
    {
        $this->conn = Database::getConnection();
    }

    public function listar() 
    {
        $stmt = $this->conn->query("SELECT * FROM clientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrar(array $dados) 
    {
        $stmt = $this->conn->prepare("INSERT INTO clientes (nome, email) VALUES (:nome, :email)");
        return $stmt->execute([
            ":nome" => $dados["nome"],
            ":email" => $dados["email"]
        ]);
    }
}
