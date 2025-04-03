<?php

namespace App\Repositories;

use App\Core\Database;
use App\Interfaces\ClienteModelInterface;
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

    public function cadastrar(ClienteModelInterface $cliente): bool
    {
        try {
            $stmt = $this->conn->prepare(
                "INSERT INTO clientes 
                (nome, email, telefone, bairro, cep, cidade, logradouro, uf, data_cadastro) 
                VALUES 
                (:nome, :email, :telefone, :bairro, :cep, :cidade, :logradouro, :uf, :data_cadastro)");
            
            $stmt->execute([
                ':nome' => $cliente->getNome(),
                ':email' => $cliente->getEmail(),
                ':telefone' => $cliente->getTelefone(),
                ':bairro' => $cliente->getBairro(),
                ':cep' => $cliente->getCep(),
                ':cidade' => $cliente->getCidade(),
                ':logradouro' => $cliente->getLogradouro(),
                ':uf' => $cliente->getUf(),
                ':data_cadastro' => $cliente->getDataCadastro()->format('Y-m-d H:i:s')
            ]);
    
            return true;
        } catch (PDOException $e) {
            throw new \RuntimeException("Erro ao cadastrar cliente: " . $e->getMessage());
        }
    }
}
