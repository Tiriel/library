<?php

namespace App;

class Router
{
    private array $routes = [];

    public function addRoute(string $path, callable $callback): void {
        $this->routes[$path] = $callback;
    }

    public function dispatch(string $requestUri): void {
        foreach ($this->routes as $path => $callback) {
            $path = str_replace('/', '\/', $path);
            if (1 === preg_match("#$path#", $requestUri, $matches)) {
                \array_shift($matches);
                call_user_func($callback, ...$matches);
                return;
            }
        }

        // Si la route n'est pas trouvée, afficher une erreur 404
        echo "404 - Page not found";
    }
}
