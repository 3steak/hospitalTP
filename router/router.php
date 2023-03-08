<?php

class Router
{

    //  array to register routes 
    private array $routes;

    public function register(string $path, callable $action): void
    {
        // key path give callable action
        $this->routes[$path] = $action;
    }


    // end class
}
