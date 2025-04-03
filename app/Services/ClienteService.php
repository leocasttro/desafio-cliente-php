<?php

namespace App\Services;

use App\Interfaces\ClienteModelInterface;
use App\Repositories\ClienteRepository;

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

    public function cadastrar(ClienteModelInterface $dados) 
    {
        if (empty($dados->getNome()) || empty($dados->getEmail()) || empty($dados->getCep())) {
            throw new \InvalidArgumentException("Nome, email e CEP são obrigatórios.");
        }

        $cepData = $this->consultarCep($dados->getCep());
        if ($cepData) {
            $dados->setCidade($cepData['cidade']);
            $dados->setLogradouro($cepData['logradouro']);
            $dados->setUf($cepData['uf']);
            $dados->setBairro($cepData['bairro'] ?? $dados->getBairro());
        } else {
            throw new \RuntimeException("CEP inválido ou não encontrado.");
        }

        $this->clienteRepository->cadastrar($dados);
    }

    private function consultarCep(string $cep): ?array
    {
        $cep = preg_replace('/[^0-9]/', '', $cep);
        $url = "https://viacep.com.br/ws/{$cep}/json/";
        $response = @file_get_contents($url);
        if ($response === false) return null;
        $data = json_decode($response, true);
        if (isset($data['erro'])) return null;

        return [
            'cidade' => $data['localidade'] ?? '',
            'logradouro' => $data['logradouro'] ?? '',
            'uf' => $data['uf'] ?? '',
            'bairro' => $data['bairro'] ?? ''
        ];
    }
}
