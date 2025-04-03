<?php

namespace ClientesAPI\Repositories;

use ClientesAPI\Core\Database;
use PDO;
use PDOException;

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

        if (!isset($data['nome'], $data['email'], $data['telefone'], $data['bairro'], $data['cep'])) {
            http_response_code(400);
            echo json_encode(["error" => "Todos os campos são obrigatórios."]);
            return;
        }

        try {
            $stmt = $this->conn->prepare(
                "INSERT INTO clientes (nome, email, telefone, bairro, cep, cidade, logradouro, uf) 
                VALUES (:nome, :email, :telefone, :bairro, :cep, :cidade, :logradouro, :uf)");
            
            $stmt->execute([
                ':nome' => $dados['nome'],
                ':email' => $dados['email'],
                ':telefone' => $dados['telefone'],
                ':bairro' => $dados['bairro'],
                ':cep' => $dados['cep'],
                ':cidade' => $dados['cidade'],
                ':logradouro' => $dados['logradouro'],
                ':uf' => $dados['uf']
            ]);
    
            http_response_code(201);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(["error" => "Erro ao cadastrar cliente: " . $e->getMessage()]);
        }


    }
}
