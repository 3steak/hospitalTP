<div class="container form mb-5">
    <div class="row">
        <div class="col-12 text-center d-flex">
            <div class="content me-2">
                <h2 class="">Profil de <?= htmlspecialchars($profilPatient->lastname)  ?> <?= htmlspecialchars($profilPatient->firstname) ?></h2>
                <div class="d-fex flex-column">
                    <p class="modifExplain">Cliquer sur le boutton ci-dessous pour accéder à la modification</p>
                    <a class="triggerUdpdate"><i class="fa-solid fa-pen-to-square fa-2xl "></i></a>
                </div>

                <form method="post">
                    <fieldset disabled class="row">

                        <div class="col-lg-6">
                            <label for="disabledTextInput" class="form-label">Disabled input</label>
                            <h4 class=" text-start ">Nom</h4>
                            <input type="text" id="disabledTextInput" name="lastname" class="form-control" value="<?= htmlspecialchars($profilPatient->lastname) ?>">
                            <small><?= $error['lastname'] ?? '' ?></small>
                        </div>

                        <div class="col-lg-6">
                            <label for="disabledTextInput" class="form-label">Disabled input</label>
                            <h4 class=" text-start ">Prénom</h4>
                            <input type="text" id="disabledTextInput" name="firstname" class="form-control" value="<?= htmlspecialchars($profilPatient->firstname) ?>">
                            <small><?= $error['firstname'] ?? '' ?></small>
                        </div>

                        <div class="col-lg-6">
                            <label for="disabledTextInput" class="form-label">Disabled input</label>
                            <h4 class=" text-start ">Email</h4>
                            <input type="text" id="disabledTextInput" name="mail" class="form-control" value="<?= htmlspecialchars($profilPatient->mail) ?>">
                            <p><?= $error['mail'] ?? '' ?></p>
                        </div>

                        <div class="col-lg-6">
                            <label for="disabledTextInput" class="form-label">Disabled input</label>
                            <h4 class=" text-start ">Téléphone</h4>
                            <input type="text" id="disabledTextInput" name="phone" class="form-control" value="<?= htmlspecialchars($profilPatient->phone) ?>">
                            <small><?= $error['phone'] ?? '' ?></small>
                        </div>

                        <div class="col-lg-8 mx-auto mb-2">
                            <label for="disabledTextInput" class="form-label">Disabled input</label>
                            <h4 class=" text-start">Date de naissance</h4>
                            <input type="date" id="disabledTextInput" name="birthdate" class="form-control" value="<?= htmlspecialchars($profilPatient->birthdate) ?>">
                            <small><?= $error['date'] ?? '' ?></small>
                        </div>

                        <button type="submit" class="btn btn-primary mt-2 w-75 btnUpdate">Modifier</button>
                    </fieldset>
                </form>
            </div>

            <!-------------------- LISTE RDV ---------------->
            <div class="rdv ms-2 text-center">
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
                                <td><a class="m-1 seeProfil" title="Accéder au rendez-vous" href="/controllers/appointmentCtrl.php?id=<?= $appointment->id ?>"><i class="fa-regular fa-eye"></i></a> <i class="fa-regular fa-trash-can m-1"></i></td>
                            </tr> <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>