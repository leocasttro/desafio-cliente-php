<?php

namespace App\Services;

use App\Repositories\ClienteRepository;
use Exception;

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
        if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("E-mail inválido.");
        }

        return $this->clienteRepository->cadastrar($dados);
    }
}
