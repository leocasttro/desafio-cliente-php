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

    public function __construct(string $nome, string $email, string $cep, DateTime $dataCadastro, ?int $id = null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->cep = $cep;
        $this->dataCadastro = $dataCadastro;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    public function getDataCadastro(): DateTime
    {
        return $this->dataCadastro;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setCep(string $cep): void
    {
        $this->cep = $cep;
    }
}