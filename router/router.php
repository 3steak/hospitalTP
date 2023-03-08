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


    public function resolve(string $uri)
    {

        try {
            // Jexplode et je conserve ce que j'ai avant '?'
            $path = explode('?', $uri)[0];

            $action = $this->routes[$path] ?? null;
            if (!is_callable($action)) {
                throw new Exception('Ce chemin n\'existe pas', 1);
                die;
            } else {
                return $action();
            }
        } catch (\Throwable $th) {
            $errorMsg = $th->getMessage();
            include_once(__DIR__ . '/../views/templates/header.php');
            include(__DIR__ . '/../views/errors.php');
            include_once(__DIR__ . '/../views/templates/footer.php');
            die;
        }
    }

    // end class
}
