<?php
// Formattage de ma date en format FR 
$dateformatter = new IntlDateFormatter(
    'fr_FR',
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE,
    'Europe/Paris',
    IntlDateFormatter::GREGORIAN,
    'dd/MM/yyyy'
);
define('DATE_FORMATTER', $dateformatter);

include_once(__DIR__ . '/../models/Show.php');


try {
    //code... FONCTION POUR RECUP LES DONNEES
} catch (\Throwable $th) {
    //throw $th;
}


include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/show/exercice6.php');
