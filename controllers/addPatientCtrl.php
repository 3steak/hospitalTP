<?php

require_once(__DIR__ . '/../helpers/Database.php');
require_once(__DIR__ . '/../models/Patient.php');


// FILTRER FORMULAIRE
// DEFINIR LES ATTRIBUTS 

$patient = new Patient();
// HIDRATER LE PATIENT

include_once(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/patients/addPatient.php');
include_once(__DIR__ . '/../views/templates/footer.php');
