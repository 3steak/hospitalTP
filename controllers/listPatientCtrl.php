<?php
session_start();

require_once(__DIR__ . '/../helpers/db.php');
require_once(__DIR__ . '/../models/Patient.php');
require_once(__DIR__ . '/../helpers/flash.php');


$patient = new Patient();
$listPatients = $patient->listPatient();





include_once(__DIR__ . '/../views/templates/header.php');

// Affichage des messages flash 
if (!empty($_GET) && $_GET['register'] == 'ok') {
    flash('addPatient');
}
if (!empty($_GET) && $_GET['register'] == 'update') {
    flash('update');
}
include(__DIR__ . '/../views/patients/listPatient.php');
include_once(__DIR__ . '/../views/templates/footer.php');
