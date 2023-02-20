<?php

require_once(__DIR__ . '/../config/constant.php');
require_once(__DIR__ . '/../helpers/db.php');
require_once(__DIR__ . '/../models/Patient.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // ============= FIRSTNAME : clean and check ===========
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
    // Isnt empty
    if (empty($firstname)) {
        $error["firstname"] = '<small class="text-black">Vous devez entrer un prénom !!</small>';
    } else { // required input, return error
        $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        // tchek regex CONST
        if (!$isOk) {
            $error["firstname"] = '<small class="text-black">Le prénom n\'est pas au bon format!!</small>';
        } else {
            if (strlen($firstname) <= 2 || strlen($firstname) >= 70) {
                $error["firstname"] = '<small class="text-black">La longueur du prénom n\'est pas bonne</small>';
            }
        }
    }
    // ===================== Lastname : Clean and check =======================
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
    // isnt empty
    if (empty($lastname)) {
        $error["lastname"] = '<small class= "text-black">Vous devez entrer un nom!!</small>';
    } else { // for required, return error
        $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        if (!$isOk) {
            $error["lastname"] = '<small class= "text-black">Le nom n\'est pas au bon format!!</small>';
        } else {
            if (strlen($lastname) <= 2 || strlen($lastname) >= 70) {
                $error["lastname"] = '<small class= "text-black">La longueur du nom n\'est pas bon</small>';
            }
        }
    }
    //============================= EMAIL ================
    $mail = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    if (empty($mail)) {
        $error["email"] = '<small class="text-black">L\'email n\'est pas renseigné</small>';
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $error["email"] = '<small class= "text-black">L\'email ne correspond pas au format requis pour un email</small>';
    }



    // =============================== BIRTHDATE ===========================
    $birthdate = trim(filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_NUMBER_INT));

    if (empty($birthdate)) {
        $error['birthdate'] = '<small class="text-black">Veuillez rentrer une date de naissance.</small>';
    } else {
        $isOk = filter_var($birthdate, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_BIRTHDAY . '/')));
        if (!$isOk) {
            $error['birthdate'] = '<small class="text-black">La date de naissance n\'est pas au bon format.</small>';
        } else {
            $year = date('Y', strtotime($birthdate));
            if (date("Y") - $year < 18 || date('Y') - $year > 120) {
                $error['birthdate'] = '<small class="text-black">La date de naissance n\'est pas valide</small>';
            }
        }
    }

    // ========================  PHONE ============================

    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($phone)) {
        $validatephone = filter_var($phone, FILTER_VALIDATE_REGEXP,  array("options" => array("regexp" => '/' . REGEXP_PHONE_NUMBER . '/')));
        if (!$validatephone) {
            $error['phone'] = 'Numéro de téléphone non valide';
        }
    }
    if (empty($error)) {

        // DEFINIR LES ATTRIBUTS 

        $patient = new Patient();
        $patient->setLastname($lastname);
        $patient->setFirstname($firstname);
        $patient->setBirthdate($birthdate);
        $patient->setPhone($phone);
        $patient->setMail($mail);

        $patient->addPatient();
    }
} else {
    include_once(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/patients/addPatient.php');
}

include_once(__DIR__ . '/../views/templates/footer.php');
