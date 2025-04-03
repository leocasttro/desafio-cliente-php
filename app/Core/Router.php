<?php

namespace App\Core;

class Router 
{
    protected $routes = [];

    public function create(string $method, string $path, callable|array $callback)
    {
        $this->routes[$method][$path] = $callback;
    }

    public function init() 
    {
        header('Content-Type: application/json; charset=utf-8');

        $httpMethod = $_SERVER["REQUEST_METHOD"];
        $currentPath = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

        if (isset($this->routes[$httpMethod][$currentPath])) {
            $callback = $this->routes[$httpMethod][$currentPath];

            if (is_array($callback)) {
                $controller = new $callback[0]();
                $method = $callback[1];
                return $controller->$method();
            }

            return $callback();
        }

        http_response_code(404);
        echo json_encode(["error" => "Rota não encontrada"]);
    }
}
