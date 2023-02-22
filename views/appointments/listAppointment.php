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
                            <td><a class="m-1 seeProfil" title="Accéder au rendez-vous" href="/Appointment?id=<?= $appointment->id ?>&mail=<?= $appointment->mail ?>"><i class="fa-regular fa-eye"></i></a> <i class="fa-regular fa-trash-can m-1"></i></td>
                        </tr> <?php } ?>
                </tbody>
            </table>
        </div>
    </div>