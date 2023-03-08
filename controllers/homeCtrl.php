<?php
// include_once(__DIR__ . '/../views/templates/headerHome.php');
// include(__DIR__ . '/../views/home.php');
// include_once(__DIR__ . '/../views/templates/footer.php');
require_once(__DIR__ . '/../src/renderer.php');

class HomeCtrl
{

    public static function home()
    {

        return Renderer::make('templates/headerHome');
        return Renderer::make('home');
        return Renderer::make('templates/footer');
    }
}
