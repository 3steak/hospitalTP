<?php

require_once(__DIR__ . '/../helpers/db.php');
require_once(__DIR__ . '/../models/Patient.php');


if (!empty($_GET['id'])) {

    $patient = new Patient();
    $idPatient = $_GET['id'];

    try {
        $patient->setId($idPatient);
    } catch (\Throwable $th) {
        $errorMsg = $th->getMessage();
        include_once(__DIR__ . '/../views/templates/header.php');
        include(__DIR__ . '/../views/errors.php');
        include_once(__DIR__ . '/../views/templates/footer.php');
        die;
    }
    try {
        $profilPatient = $patient->getPatient();
    } catch (\Throwable $th) {
        $errorMsg = $th->getMessage();
        include_once(__DIR__ . '/../views/templates/header.php');
        include(__DIR__ . '/../views/errors.php');
        include_once(__DIR__ . '/../views/templates/footer.php');
        die;
    }
} else {
    echo 'id inexistant';
}






include_once(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/patients/profilPatient.php');
include_once(__DIR__ . '/../views/templates/footer.php');
