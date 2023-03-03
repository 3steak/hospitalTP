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
    if (!empty($appointments)) { ?>
        <table class="table table-bordered table-striped mt-4 neumorphic">
            <thead>
                <tr class="">
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointments as $appointment) { ?>
                    <tr>
                        <td><?= htmlspecialchars($appointment->lastname) ?></td>
                        <td><?= htmlspecialchars($appointment->firstname) ?></td>
                        <td class=""><?= htmlspecialchars(date('d/m/Y', strtotime($appointment->dateHour))) ?></td>
                        <td class=""><?= htmlspecialchars(date('H:i', strtotime($appointment->dateHour))) ?></td>
                        <td><a class="m-1 seeProfil" title="Accéder au rendez-vous" href="/controllers/appointmentCtrl.php?id=<?= $appointment->id ?>"><i class="fa-regular fa-eye"></i></a>
                            <a class="m-1 deleteApt" title="Supprimer le rendez-vous" data-bs-toggle="modal" data-bs-target="#livesearchModal" data-name="<?= htmlspecialchars($appointment->lastname) ?> <?= htmlspecialchars($appointment->firstname) ?>" data-id="<?= $appointment->id ?>">
                                <i class="fa-regular fa-trash-can m-1"></i>
                        </td>
                    </tr> <?php } ?>
            </tbody>
        </table>
        <!--  IF COUNT APPOINTMENTS > 10 alors pagination -->
        <!-- Modal -->
        <div class="modal fade" id="livesearchModal" tabindex="-1" aria-labelledby="validateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="validateModalLabel">Suppression du rendez-vous</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Supprimer le rendez-vous de <span class="fullname"></span> ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a class="btn btn-primary" id="linkDelete" href="/DeleteAppointment?id=" role="button">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "<h6 class='text-danger texte-center mt-3'>NO DATA FOUND</h6>";
    }
}



//  PAGINATION 

//  NOMBRE RDV TOTAL = COUNT APPOINTMENTS
//  NOMBRE RDV PAR PAGE = LIMIT 10 IF  count APPOINTMMENTS >10


// NUMERO PAGE page=?
// SI NUMERO PAGE INCONNU page=1
// if (!empty($_GET['page'])) {
//     $currentPage = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
// } else {
//     $currentPage = 1;
// }
