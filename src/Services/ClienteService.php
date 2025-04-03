<?php

namespace ClientesAPI\Services;

use ClientesAPI\Repositories\ClienteRepository;

class ClienteService
{
    private ClienteRepository $clienteRepository;

    public function __construct() 
    {
        $this->clienteRepository = new ClienteRepository();
    }

    public function listar() 
    {
        return $this->clienteRepository->listar();
    }

    public function cadastrar(array $dados) 
    {
        return $this->clienteRepository->cadastrar($dados);
    }
}
