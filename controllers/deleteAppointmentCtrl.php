<?php
session_start();
require_once(__DIR__ . '/../models/Appointment.php');
require_once(__DIR__ . '/../helpers/flash.php');
// flash('deleted', 'Rendez-vous supprimé avec succès ! ', FLASH_SUCCESS);
// flash('noDeleted', 'Rendez-vous non supprimé ! ', FLASH_INFO);



// // DELETE le rdv

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

try {
    if (Appointment::isIdRdvExist($id) === false) {
        throw new Exception("Ce rendez-vous n'existe pas", 1);
    }
    $result = Appointment::deleteAppointment($id);
    if ($result) {
        // renvoyer sur list si execute 
        header('location: /ListAppointments?register=deleted');
        die;
    } else {
        header('location: /ListAppointments?register=noDeleted');
        die;
    }
} catch (\Throwable $th) {
    $errorMsg = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/errors.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}

include_once(__DIR__ . '/../views/templates/footer.php');
