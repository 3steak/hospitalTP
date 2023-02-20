<div class="container form mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="text-white p-4 mb-5">LISTE DES PATIENTS</h2>
            <table id="dataTable" class="display neumorphic">
                <thead>
                    <tr class="">
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th class="dNoneMobil">Date de naissance</th>
                        <th class="dNoneMobil">Tel</th>
                        <th class="dNoneMobil">Mail</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listPatients as $listPatient) { ?>

                        <tr>
                            <td><?= $listPatient->lastname ?></td>
                            <td><?= $listPatient->firstname ?></td>
                            <td class="dNoneMobil"><?= $listPatient->birthdate ?></td>
                            <td class="dNoneMobil"><?= $listPatient->phone ?></td>
                            <td class="dNoneMobil"><?= $listPatient->mail ?></td>
                            <td><a class="m-1" href="/controllers/profilPatientCtrl.php?id=<?= $listPatient->id ?>"><i class="fa-regular fa-eye"></i></a> <i class="fa-regular fa-pen-to-square m-1"></i><i class="fa-regular fa-trash-can m-1"></i></td>
                        </tr> <?php } ?>
                </tbody>

            </table>
        </div>
    </div>