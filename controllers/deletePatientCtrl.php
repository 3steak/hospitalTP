<?php
session_start();
require_once(__DIR__ . '/../models/Patient.php');
require_once(__DIR__ . '/../helpers/flash.php');
flash('deleted', 'Patient supprimé avec succès ! ', FLASH_SUCCESS);
flash('noDeleted', 'Patient non supprimé ! ', FLASH_INFO);



// // DELETE le rdv

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

try {
    if (Patient::isIdExist($id) === false) {
        throw new Exception("Ce patient n'existe pas", 1);
    }
    $isDeleted = Patient::deletePatient($id);
    if (!$isDeleted) {
        throw new Exception('Rendez-vous non mis a jour', 1);
    }
} catch (\Throwable $th) {
    $errorMsg = $th->getMessage();
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/errors.php');
    include_once(__DIR__ . '/../views/templates/footer.php');
    die;
}

include_once(__DIR__ . '/../views/templates/footer.php');
