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
                    <?php foreach ($listPatients as $patient) { ?>

                        <tr>
                            <td><?= htmlspecialchars($patient->lastname) ?></td>
                            <td><?= htmlspecialchars($patient->firstname) ?></td>
                            <td class="dNoneMobil"><?= htmlspecialchars(date('d/m/Y', strtotime($patient->birthdate))) ?></td>
                            <td class="dNoneMobil"><a class="telmail" title="Envoyer un mail" href="tel:<?= htmlspecialchars($patient->phone)  ?>"><?= htmlspecialchars($patient->phone)  ?></a> </td>
                            <td class="dNoneMobil"><a class="telmail" title="Appeler" href="mailto:<?= htmlspecialchars($patient->mail) ?>"><?= htmlspecialchars($patient->mail) ?></a></td>
                            <td><a class="m-1 seeProfil" title="Accéder au profil du patient" href="/ProfilPatient?id=<?= $patient->id ?>"><i class="fa-regular fa-eye"></i></a> <i class="fa-regular fa-trash-can m-1"></i></td>
                        </tr> <?php } ?>
                </tbody>
            </table>
        </div>
    </div>