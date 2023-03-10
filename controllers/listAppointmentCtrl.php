<?php
require_once(__DIR__ . '/../models/Appointment.php');
require_once(__DIR__ . '/../vendor/autoload.php');



@include('flash::message');

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

include(__DIR__ . '/../views/appointments/listAppointment.php');
include_once(__DIR__ . '/../views/templates/footer.php');
