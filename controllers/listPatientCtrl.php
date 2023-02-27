<?php
session_start();
require_once(__DIR__ . '/../models/Patient.php');
require_once(__DIR__ . '/../helpers/flash.php');

try {
    $listPatients = Patient::listPatient();
} catch (\Throwable $th) {
    $errorMsg = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/errors.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}



include_once(__DIR__ . '/../views/templates/header.php');

// Affichage des messages flash 
if (!empty($_GET) && $_GET['register'] == 'ok') {
    flash('addPatient');
}
if (!empty($_GET) && $_GET['register'] == 'update') {
    flash('update');
}
if (!empty($_GET) && $_GET['register'] == 'noUpdate') {
    flash('noUpdate');
}
include(__DIR__ . '/../views/patients/listPatient.php');
include_once(__DIR__ . '/../views/templates/footer.php');
