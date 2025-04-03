<?php

namespace App\Model;

use App\Interfaces\LogModelInterface;
use DateTime;

class Log implements LogModelInterface
{
    private ?int $id = null;
    private string $url;
    private string $responseBody;
    private int $statusCode;
    private DateTime $createdAt;

    public function __construct(string $url, string $responseBody, string $statusCode)
    {
        $this->url = $url;
        $this->responseBody = $responseBody;
        $this->statusCode = $statusCode;
        $this->createdAt = new DateTime();
    }

    public function getId(): ?int { return $this->id; }
    public function getUrl(): string { return $this->url; }
    public function getResponseBody(): string { return $this->responseBody; }
    public function getStatusCode(): int { return $this->statusCode; }
    public function getCreatedAt(): DateTime { return $this->createdAt; }


    public function setUrl(string $url): void { $this->url = $url; }
    public function setResponseBody(string $responseBody): void { $this->responseBody = $responseBody; }
    public function setStatusCode(int $statusCode): void { $this->statusCode = $statusCode; }
    public function setCreatedAt(DateTime $createdAt): void { $this->createdAt = $createdAt; }
}