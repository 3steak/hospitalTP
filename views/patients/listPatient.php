<div class="container form mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <?= var_dump($listPatients) ?>
            <h2 class="text-white ">LISTE DES PATIENTS</h2>
            <table class="neumorphic">
                <?php foreach ($listPatients as $listPatient) { ?>
                    <thead>
                        <tr class="">
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th class="">Date de naissance</th>
                            <th class="">Tel</th>
                            <th class="">Mail</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $listPatient->lastname ?></td>
                            <td><?= $listPatient->firstname ?></td>
                            <td class=""><?= $listPatient->birthdate ?></td>
                            <td class=""><?= $listPatient->phone ?></td>
                            <td class=""><?= $listPatient->mail ?></td>
                            <td><a class="m-1" href="/views/patients/profilPatient.php?id=<?= $listPatient->id ?>"><i class="fa-regular fa-eye"></i></a> <i class="fa-regular fa-pen-to-square m-1"></i><i class="fa-regular fa-trash-can m-1"></i></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>