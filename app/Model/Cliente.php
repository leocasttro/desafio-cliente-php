<?php

namespace App\Model;

use App\Interfaces\ClienteModelInterface;
use DateTime;

class Cliente implements ClienteModelInterface
{
private ?int $id = null;
    private string $nome;
    private string $email;
    private string $cep;
    private DateTime $dataCadastro;
    private ?string $telefone = null;
    private ?string $bairro = null;
    private ?string $cidade = null;
    private ?string $logradouro = null;
    private ?string $uf = null;

    public function __construct(string $nome, string $email, string $cep, ?string $telefone = null, ?string $bairro = null)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->cep = $cep;
        $this->telefone = $telefone;
        $this->bairro = $bairro;
        $this->dataCadastro = new DateTime();
    }

    public function getId(): ?int { return $this->id; }
    public function getNome(): string { return $this->nome; }
    public function getEmail(): string { return $this->email; }
    public function getCep(): string { return $this->cep; }
    public function getDataCadastro(): DateTime { return $this->dataCadastro; }
    public function getTelefone(): ?string { return $this->telefone; }
    public function getBairro(): ?string { return $this->bairro; }
    public function getCidade(): ?string { return $this->cidade; }
    public function getLogradouro(): ?string { return $this->logradouro; }
    public function getUf(): ?string { return $this->uf; }

    public function setNome(string $nome): void { $this->nome = $nome; }
    public function setEmail(string $email): void { $this->email = $email; }
    public function setCep(string $cep): void { $this->cep = $cep; }
    public function setDataCadastro(DateTime $dataCadastro): void { $this->dataCadastro = $dataCadastro; }
    public function setTelefone(string $telefone): void { $this->telefone = $telefone; }
    public function setBairro(string $bairro): void { $this->bairro = $bairro; }
    public function setCidade(string $cidade): void { $this->cidade = $cidade; }
    public function setLogradouro(string $logradouro): void { $this->logradouro = $logradouro; }
    public function setUf(string $uf): void { $this->uf = $uf; }
}