<?php

class Router
{

    //  array to register routes 
    private array $routes;

    public function register(string $path, callable|string $action): void
    {
        // key path give callable action
        $this->routes[$path] = $action;
    }


    public function resolve(string $uri)
    {


        // Jexplode et je conserve ce que j'ai avant '?'
        $path = explode('?', $uri)[0];

        $action = $this->routes[$path] ?? null;

        if (is_callable($action)) {
            return $action();
        }
        if (is_string($action)) {
            return $action;
        }
        throw new Exception('Ce chemin n\'existe pas', 1);
        die;
    }

    // end class
}
