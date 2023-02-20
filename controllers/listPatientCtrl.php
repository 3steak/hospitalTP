<?php

require_once(__DIR__ . '/../helpers/db.php');
require_once(__DIR__ . '/../models/Patient.php');


$patient = new Patient();
$listPatients = $patient->listPatient();




// DATATABLE

// $dataset = array(
//     "echo" => 1,
//     "totalrecords" => count($listPatients),
//     "totaldisplayrecords" => count($listPatients),
//     "data" => $listPatients
// );
// echo json_encode($dataset);

// Faire appel a la methode listPatient 

include_once(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/patients/listPatient.php');
include_once(__DIR__ . '/../views/templates/footer.php');
