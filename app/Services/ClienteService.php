<?php
// app/Services/ClienteService.php
namespace App\Services;

use App\Interfaces\ClienteModelInterface;
use App\Model\Log;
use App\Repositories\ClienteRepository;
use App\Repositories\LogRepository;

class ClienteService
{
    private ClienteRepository $clienteRepository;
    private LogRepository $logRepository;

    public function __construct()
    {
        $this->clienteRepository = new ClienteRepository();
        $this->logRepository = new LogRepository();
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

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);

        curl_close($ch);

        $log = new Log($url, $response ?: $curlError, $statusCode);
        $this->logRepository->salvarLog($log);

        if ($response === false || $statusCode !== 200) {
            return null;
        }

        $data = json_decode($response, true);
        if (isset($data['erro'])) {
            return null;
        }

        return [
            'cidade' => $data['localidade'] ?? '',
            'logradouro' => $data['logradouro'] ?? '',
            'uf' => $data['uf'] ?? '',
            'bairro' => $data['bairro'] ?? ''
        ];
    }
}