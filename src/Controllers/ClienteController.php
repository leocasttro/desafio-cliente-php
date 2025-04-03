<?php

namespace ClientesAPI\Controllers;

use ClientesAPI\Services\ClienteService;

class ClienteController
{
    private ClienteService $clienteService;

    public function __construct() 
    {
        $this->clienteService = new ClienteService();
    }

    public function listar() 
    {
        echo json_encode($this->clienteService->listar());
    }

    public function cadastrar() 
    {
        $dados = json_decode(file_get_contents("php://input"), true);
        $this->clienteService->cadastrar($dados);
        echo json_encode(["message" => "Cliente cadastrado com sucesso"]);
    }
}
