<?php
// header('location: /Accueil');
// die;




require_once(__DIR__ . '/router/router.php');
// Call class router
$router = new Router();

// add route for / with callable ( function call)
// routes register in array
//  '/' is key as url and function is the action to call
$router->register('/', function () {
    return  header('location: /homeCtrl.php');
    die;
});
$router->register('/AddPatient', function () {
    return 'addPatient page';
});


// call actions
$router->resolve($_SERVER['REQUEST_URI']);
