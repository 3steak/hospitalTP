<?php
// header('location: /Accueil');
// die;

require_once(__DIR__ . '/controllers/homeCtrl.php');
require_once(__DIR__ . '/router/router.php');
// Call class router
$router = new Router();

define('BASE_VIEW_PATH', __DIR__ . '/views/');

// add route for / with callable ( function call)
// routes register in array
//  '/' is key as url and function is the action to call
$router->register('/', HomeCtrl::home());



// $router->register('/AddPatient', function () {
//     return 'addPatient page';
// });

try {
    echo $router->resolve($_SERVER['REQUEST_URI']);
} catch (\Throwable $th) {
    $errorMsg = $th->getMessage();
    include_once(__DIR__ . '/views/templates/header.php');
    include(__DIR__ . '/views/errors.php');
    include_once(__DIR__ . '/views/templates/footer.php');
    die;
}
