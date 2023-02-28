<?php
session_start();
require_once(__DIR__ . '/../models/Appointment.php');
require_once(__DIR__ . '/../helpers/flash.php');

try {
    $appointments = Appointment::listAppointment();
} catch (\Throwable $th) {
    $errorMsg = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/errors.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}


include_once(__DIR__ . '/../views/templates/header.php');

// Affichage des messages flash 

if (!empty($_GET) && $_GET['register'] == 'rdvOk') {
    flash('addRDV');
}
if (!empty($_GET) && $_GET['register'] == 'update') {
    flash('update');
}
if (!empty($_GET) && $_GET['register'] == 'noUpdate') {
    flash('noUpdate');
}
if (!empty($_GET) && $_GET['register'] == 'deleted') {
    flash('deleted');
}
if (!empty($_GET) && $_GET['register'] == 'noDeleted') {
    flash('noDeleted');
}

include(__DIR__ . '/../views/appointments/listAppointment.php');
include_once(__DIR__ . '/../views/templates/footer.php');
