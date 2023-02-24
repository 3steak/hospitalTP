<?php
session_start();
require_once(__DIR__ . '/../config/constant.php');
require_once(__DIR__ . '/../helpers/db.php');
require_once(__DIR__ . '/../models/Appointment.php');
require_once(__DIR__ . '/../helpers/flash.php');

$listPatients = Patient::listPatient();


// JE FILTRE MON RDV 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // ================================  idPatient ====================================

    $idPatient = trim(filter_input(INPUT_POST, 'idPatient', FILTER_SANITIZE_NUMBER_INT));
    if (empty($idPatient) || $idPatient == '') {
        $error['idPatient'] = '<small class="text-black">Veuillez selectionner un patient.</small>';
    }
    // else {
    //     $isOk= filter_var($idPatient, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' .  . '/')));
    // }

    $dateHour  = $_POST['date'] . ' ' . $_POST['hour'];

    //     // =============================== DATEHOUR ===========================
    //     $dateHour = trim(filter_input(INPUT_POST, 'dateHour', FILTER_SANITIZE_NUMBER_INT));

    //     // if (empty($dateHour)) {
    //     //     $error['dateHour'] = '<small class="text-black">Veuillez rentrer une date de naissance.</small>';
    //     // } else {
    //     //     $isOk = filter_var($dateHour, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_BIRTHDAY . '/')));
    //     //     if (!$isOk) {
    //     //         $error['dateHour'] = '<small class="text-black">La date de naissance n\'est pas au bon format.</small>';
    //     //     } else {
    //     //         $year = date('Y', strtotime($dateHour));
    //     //         if (date("Y") - $year < 18 || date('Y') - $year > 120) {
    //     //             $error['dateHour'] = '<small class="text-black">La date de naissance n\'est pas valide</small>';
    //     //         }
    //     //     }
    //     // }

    if (empty($error)) {
        try {
            $appointment = new Appointment();
            $appointment->setDateHour($dateHour);
            $appointment->setIdPatient($idPatient);
            $appointment->addAppointment();
            flash('addRDV', 'Rendez-vous enregistré avec succès ! ', FLASH_SUCCESS);
        } catch (\Throwable $th) {
            $errorMsg = $th->getMessage();
            include_once(__DIR__ . '/../views/templates/header.php');
            include(__DIR__ . '/../views/errors.php');
            include_once(__DIR__ . '/../views/templates/footer.php');
            die;
        }
    }
    // si EMPTY $POST
} else {
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/appointments/addAppointment.php');
}

include_once(__DIR__ . '/../views/templates/footer.php');
