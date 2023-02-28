<div class="container form mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="text-white p-4 mb-5">LISTE RENDEZ-VOUS</h2>
            <table id="dataTable" class="display neumorphic">
                <thead>
                    <tr class="">
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th class="">Date</th>
                        <th class="">Heure</th>
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
        </div>
        <!-- Modal -->
        <div class="modal fade" id="validateModal" tabindex="-1" aria-labelledby="validateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="validateModalLabel">Suppression du rendez-vous</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Supprimer le rendez-vous de <span><?= htmlspecialchars($appointment->lastname) ?></span> <span><?= htmlspecialchars($appointment->firstname) ?></span>, le <span><?= htmlspecialchars(date('d/m/Y', strtotime($appointment->dateHour))) ?></span> à <span><?= htmlspecialchars(date('H:i', strtotime($appointment->dateHour))) ?></span> ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a class="btn btn-primary" href="/DeleteAppointment?id=<?= $appointment->id ?>" role="button">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>