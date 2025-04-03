<?php

namespace App\Interfaces;

use DateTime;

interface ClienteModelInterface 
{
    public function getId(): ?Int;
    public function getNome(): string;
    public function getEmail(): string;
    public function getCep(): string;
    public function getDataCadastro(): DateTime;
    public function setNome(string $nome): void;
    public function setEmail(string $email): void;
    public function setCep(string $cep): void;
}