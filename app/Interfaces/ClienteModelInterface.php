<?php

namespace App\Interfaces;

use DateTime;

interface ClienteModelInterface 
{
public function getId(): ?int;
    public function getNome(): string;
    public function getEmail(): string;
    public function getCep(): string;
    public function getDataCadastro(): DateTime;
    public function getTelefone(): ?string;
    public function getBairro(): ?string;
    public function getCidade(): ?string;
    public function getLogradouro(): ?string;
    public function getUf(): ?string;
    public function setNome(string $nome): void;
    public function setEmail(string $email): void;
    public function setCep(string $cep): void;
    public function setDataCadastro(DateTime $dataCadastro): void;
    public function setTelefone(string $telefone): void;
    public function setBairro(string $bairro): void;
    public function setCidade(string $cidade): void;
    public function setLogradouro(string $logradouro): void;
    public function setUf(string $uf): void;
}