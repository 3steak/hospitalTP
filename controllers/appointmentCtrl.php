<?php
session_start();
require_once(__DIR__ . '/../helpers/db.php');
require_once(__DIR__ . '/../models/Patient.php');
require_once(__DIR__ . '/../models/Appointment.php');
require_once(__DIR__ . '/../config/constant.php');
require_once(__DIR__ . '/../helpers/flash.php');
flash('update', 'Rendez-vous modifié avec succès ! ', FLASH_SUCCESS);



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

    //     // ctrl if RDV = RDV
    //     // if ($mail != $mailPatient && $patient::isMailExist($mail)) {
    //     //     $error['mail'] = '<small class="text-black">Le mail renseigné existe déjà !</small>';
    //     // }
    //     if (empty($error)) {

    //         // DEFINIR LES ATTRIBUTS 
    //         try {
    //             $appointment = new Appointment();
    //             $appointment->setDateHour($dateHour);
    //             $appointment->setIdPatient($idPatient);
    //             $appointment->updateAppointment();
    //         } catch (\Throwable $th) {
    //             //throw $th;
    //         }
    //     } else {
    //         include_once(__DIR__ . '/../views/templates/header.php');
    //         include(__DIR__ . '/../views/appointments/appointment.php');
    //     }

    //     // si EMPTY $POST
} else {
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/appointments/appointment.php');
}

include_once(__DIR__ . '/../views/templates/footer.php');
