<?php

namespace App\Interfaces;

use DateTime;

interface LogModelInterface 
{
public function getId(): ?int;
    public function getUrl(): string;
    public function getResponseBody(): string;
    public function getStatusCode(): int;
    public function getCreatedAt(): DateTime;
    public function setUrl(string $url): void;
    public function setResponseBody(string $responseBody): void;
    public function setStatusCode(int $statusCode): void;
    public function setCreatedAt(DateTime $dataCadastro): void;

}