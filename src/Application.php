<?php

namespace ClientesAPI;

use ClientesAPI\Core\Router;
use ClientesAPI\Controllers\ClienteController;

class Application
{
    public function start() {
        $router = new Router();

        $router->create("GET", "/", function () {
            echo json_encode(["status" => "API funcionando"]);
        });

        $router->create("GET", "/clientes", [ClienteController::class, 'listar']);
        $router->create("POST", "/clientes", [ClienteController::class, 'cadastrar']);

        $router->init();
    }
}
