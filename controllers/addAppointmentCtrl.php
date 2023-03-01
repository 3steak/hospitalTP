<?php
session_start();
require_once(__DIR__ . '/../config/constant.php');
require_once(__DIR__ . '/../helpers/db.php');
require_once(__DIR__ . '/../models/Appointment.php');
require_once(__DIR__ . '/../helpers/flash.php');
flash('addRDV', 'Rendez-vous enregistré avec succès ! ', FLASH_SUCCESS);

$listPatients = Patient::listPatient();


// JE FILTRE MON RDV 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // ================================  idPatient ====================================

    $idPatient = trim(filter_input(INPUT_POST, 'idPatient', FILTER_SANITIZE_NUMBER_INT));
    if (empty($idPatient) || $idPatient == '') {
        $error['idPatient'] = '<small class="text-black">Veuillez selectionner un patient.</small>';
    }



    // =============================== DATE ===========================
    // Sanitize number int garde les chiffres les + et les moins
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_NUMBER_INT));

    if (empty($date)) {
        $error['date'] = '<small class="text-black">Veuillez rentrer une date de naissance.</small>';
    } else {
        $isOk = filter_var($date, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_BIRTHDAY . '/')));
        if (!$isOk) {
            $error['date'] = '<small class="text-black">La date de naissance n\'est pas au bon format.</small>';
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

    $dateHour  = $date . ' ' . $hour;
    if (Appointment::isAptExist($dateHour)) {
        $error["apt"] = '<small class= "text-black">Le rendez-vous existe déjà en Base de données pour ce patient</small>';
    }
    if (empty($error)) {

        try {
            $appointment = new Appointment();
            $appointment->setDateHour($dateHour);
            $appointment->setIdPatient($idPatient);
            $result = $appointment->addAppointment();
            if ($result) {
                // renvoyer sur list si ligne affectée 
                header('location: /ListAppointments?register=rdvOk');
                die;
            } else {
                throw new Exception('Rendez-vous non ajouté', 1);
                die;
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
        include(__DIR__ . '/../views/appointments/addAppointment.php');
    }
    // si EMPTY $POST
} else {
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/appointments/addAppointment.php');
}

include_once(__DIR__ . '/../views/templates/footer.php');
