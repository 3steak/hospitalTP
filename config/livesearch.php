<?php
require_once(__DIR__ . '/../helpers/db.php');
if (isset($_POST['input'])) {

    $input = $_POST['input'];

    $request = "SELECT appointments.id, `dateHour`, `idPatients`, `lastname`, `firstname`, `mail`
    FROM `appointments` JOIN `patients` 
    ON appointments.idPatients = patients.id WHERE `lastname` LIKE '{$input}%' OR `dateHour` LIKE '{$input}%' OR `firstname` LIKE '{$input}%' OR `mail` LIKE '{$input}%' ;";

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
                            <a class="m-1 deleteApt" title="Supprimer le rendez-vous" data-bs-toggle="modal" data-bs-target="#validateModal">
                                <i class="fa-regular fa-trash-can m-1"></i>
                        </td>
                    </tr> <?php } ?>
            </tbody>
        </table>

<?php
    } else {
        echo "<h6 class='text-danger texte-center mt-3'>NO DATA FOUND</h6>";
    }
}
