<?php

namespace App\Core;

use App\Controllers\ClienteController;
use App\Services\ClienteService;
use App\Repositories\ClienteRepository;

class Router
{
    private array $routes = [];

    public function create(string $method, string $path, $callback)
    {
        $this->routes[] = ['method' => $method, 'path' => $path, 'callback' => $callback];
    }

    public function init()
    {
        $this->setCorsHeaders();

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit();
        }

        $method = $_SERVER['REQUEST_METHOD'];
        $path = $_SERVER['REQUEST_URI'];

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                if (is_callable($route['callback'])) {
                    call_user_func($route['callback']);
                } elseif (is_array($route['callback'])) {
                    [$class, $method] = $route['callback'];

                    if ($class === ClienteController::class) {
                        $repository = new ClienteRepository();
                        $service = new ClienteService($repository);
                        $controller = new ClienteController($service);
                    } else {
                        $controller = new $class();
                    }

                    $controller->$method();
                }
                return;
            }
        }
        http_response_code(404);
        echo json_encode(["error" => "Rota não encontrada"]);
    }

    private function setCorsHeaders()
    {
        header("Access-Control-Allow-Origin: http://localhost:3000");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Max-Age: 3600");
    }
}