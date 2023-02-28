<?php
session_start();
require_once(__DIR__ . '/../helpers/db.php');
require_once(__DIR__ . '/../models/Patient.php');
require_once(__DIR__ . '/../models/Appointment.php');
require_once(__DIR__ . '/../config/constant.php');
require_once(__DIR__ . '/../helpers/flash.php');
flash('update', 'Rendez-vous modifié avec succès ! ', FLASH_SUCCESS);
flash('noUpdate', 'Rendez-vous non modifié ! ', FLASH_INFO);



// FILTRE trim FILTERVAR
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

try {
    if (Appointment::isIdRdvExist($id) === false) {
        throw new Exception("Ce rendez-vous n'existe pas", 1);
    }
    $appointment = Appointment::getAppointment($id);
    $listPatients = Patient::listPatient();
} catch (\Throwable $th) {
    $errorMsg = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/errors.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}

// // UPDATE le rdv

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // ================================  idPatient ====================================

    $idPatient = intval(filter_input(INPUT_POST, 'idPatient', FILTER_SANITIZE_NUMBER_INT));




    // =============================== DATE ===========================
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_NUMBER_INT));

    if (empty($date)) {
        $error['date'] = '<small class="text-black">Veuillez rentrer une date de naissance.</small>';
    } else {
        $isOk = filter_var($date, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_BIRTHDAY . '/')));
        if (!$isOk) {
            $error['date'] = '<small class="text-black">La date du rdv n\'est pas au bon format.</small>';
        }
        if (strtotime($date) < strtotime('now')) {
            $error['date'] = '<small class="text-black">La date du rdv antérieure à ajd.</small>';
        }
    }

    // ======================== HOUR =============================

    $hour = trim(filter_input(INPUT_POST, 'hour', FILTER_SANITIZE_SPECIAL_CHARS));

    if (empty($hour)) {
        $error['hour'] = '<small class="text-black">Veuillez rentrer une heure de rendez vous</small>';
    } else {
        $isOk = filter_var($hour, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_HOUR . '/')));
        if (!$isOk) {
            $error['hour'] = '<small class="text-black">L`\'heure n\'est pas au bon format.</small>';
        }
    }


    if (empty($error)) {
        $dateHour  = $date . ' ' . $hour;
        try {
            $appointment = new Appointment();
            $appointment->setId($id);
            $appointment->setDateHour($dateHour);
            $appointment->setIdPatient($idPatient);
            $isUpdated = $appointment->updateAppointment();


            if (!$isUpdated) {
                throw new Exception('Rendez-vous non mis a jour', 1);
            }
        } catch (\Throwable $th) {
            $errorMsg = $th->getMessage();
            include_once(__DIR__ . '/../views/templates/header.php');
            include(__DIR__ . '/../views/errors.php');
            include_once(__DIR__ . '/../views/templates/footer.php');
            die;
        }
    } else {
        include_once(__DIR__ . '/../views/templates/header.php');
        include(__DIR__ . '/../views/appointments/appointment.php');
    }

    // si EMPTY $POST
} else {
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/appointments/appointment.php');
}

include_once(__DIR__ . '/../views/templates/footer.php');
