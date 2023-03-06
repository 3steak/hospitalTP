<?php
require_once(__DIR__ . '/../helpers/db.php');
if (isset($_GET['input'])) {
    $input = trim(filter_input(INPUT_GET, 'input', FILTER_SANITIZE_SPECIAL_CHARS));

    //  dans methode GET
    $request = "SELECT appointments.id, `dateHour`, `idPatients`, `lastname`, `firstname`, `mail`
    FROM `appointments` JOIN `patients` 
    ON appointments.idPatients = patients.id WHERE `lastname` LIKE '%{$input}%' OR `dateHour` LIKE '%{$input}%' OR `firstname` LIKE '%{$input}%' OR `mail` LIKE '%{$input}%'  ORDER BY `lastname` LIMIT 10;";

    $appointments = Database::connect()->prepare($request);

    $appointments->execute();
    $appointments = $appointments->fetchAll();
    if (count($appointments) > 0) {
        echo json_encode($appointments);
    } else {
        false;
    }
}



//  PAGINATION 

//  NOMBRE RDV PAR PAGE = LIMIT 10 IF  count APPOINTMMENTS >10


// NUMERO PAGE page=?
// SI NUMERO PAGE INCONNU page=1
// if (!empty($_GET['page'])) {
//     $currentPage = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
// } else {
//     $currentPage = 1;
// }


//  NOMBRE RDV TOTAL = COUNT APPOINTMENTS
// $sql = 'SELECT COUNT(*) AS nbRdv FROM `appointments`';
// $sth = Database::connect()->prepare($sql);
// $sth->execute();
// $result = $sth->fetch();
// $nbRDV = (int) $result['nbRDV];
// var_dump($nbRDV);
