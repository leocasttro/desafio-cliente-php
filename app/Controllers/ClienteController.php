<?php
namespace App\Controllers;

use App\Model\Cliente;
use App\Services\ClienteService;
class ClienteController
{
    private ClienteService $service;

    public function __construct(ClienteService $service)
    {
        $this->service = $service;
    }

    public function cadastrar()
    {
        $input = json_decode(file_get_contents('php://input'), true);

        if (!$input || !isset($input['nome'], $input['email'], $input['cep'])) {
            http_response_code(400);
            echo json_encode(["error" => "Nome, email e CEP são obrigatórios"]);
            return;
        }

        try {
            $cliente = new Cliente(
                $input['nome'],
                $input['email'],
                $input['cep'],
                $input['telefone'] ?? null,
                $input['bairro'] ?? null
            );
            
            $this->service->cadastrar($cliente);
            http_response_code(201);
            echo json_encode(["message" => "Cliente cadastrado com sucesso"]);
        } catch (\Exception $e) {
            http_response_code(400);
            echo json_encode(["error" => $e->getMessage()]);
        }
    }

    public function listar()
    {
        echo json_encode($this->service->listar());
    }
}