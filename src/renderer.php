<?php

class Renderer
{

    public function __construct(private string $viewPath)
    {
    }

    public function view()
    {
        // mise en tampon pour recup variables
        ob_start();

        require BASE_VIEW_PATH . $this->viewPath . '.php';


        // Relache la mise en tampon
        return ob_get_clean();
    }
    public static function make(string $viewPath)
    {
        // permet de return new instance of renderer
        return new static($viewPath);
    }

    public function __toString()
    {
        return $this->view();
    }
    // 
}
