<div class="container form mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <div class="content">
                <h2 class="">Profil de <?= htmlspecialchars($profilPatient->lastname)  ?> <?= htmlspecialchars($profilPatient->firstname) ?></h2>
                <div class="d-fex flex-column">
                    <p class="modifExplain">Cliquer sur le boutton ci-dessous pour accéder à la modification</p>
                    <a class="triggerUdpdate"><i class="fa-solid fa-pen-to-square fa-2xl "></i></a>
                </div>

                <form action="" method="post">
                    <fieldset disabled>

                        <div class="">
                            <label for="disabledTextInput" class="form-label">Disabled input</label>
                            <h4 class=" text-start ">Nom</h4>
                            <input type="text" id="disabledTextInput" name="lastname" class="form-control" value="<?= htmlspecialchars($profilPatient->lastname) ?>">
                        </div>
                        <small><?= $error['lastname'] ?? '' ?></small>

                        <div class="">
                            <label for="disabledTextInput" class="form-label">Disabled input</label>
                            <h4 class=" text-start ">Prénom</h4>
                            <input type="text" id="disabledTextInput" name="firstname" class="form-control" value="<?= htmlspecialchars($profilPatient->firstname) ?>">
                        </div>
                        <small><?= $error['firstname'] ?? '' ?></small>

                        <div class="">
                            <label for="disabledTextInput" class="form-label">Disabled input</label>
                            <h4 class=" text-start">Date de naissance</h4>
                            <input type="date" id="disabledTextInput" name="birthdate" class="form-control" value="<?= htmlspecialchars($profilPatient->birthdate) ?>">
                        </div>
                        <small><?= $error['date'] ?? '' ?></small>

                        <div class="">
                            <label for="disabledTextInput" class="form-label">Disabled input</label>
                            <h4 class=" text-start ">Téléphone</h4>
                            <input type="text" id="disabledTextInput" name="phone" class="form-control" value="<?= htmlspecialchars($profilPatient->phone) ?>">
                        </div>
                        <small><?= $error['phone'] ?? '' ?></small>

                        <div class="">
                            <label for="disabledTextInput" class="form-label">Disabled input</label>
                            <h4 class=" text-start ">Email</h4>
                            <input type="text" id="disabledTextInput" name="mail" class="form-control" value="<?= htmlspecialchars($profilPatient->mail) ?>">
                        </div>
                        <p><?= $error['mail'] ?? '' ?></p>

                        <button type="submit" class="btn btn-primary btnUpdate">Modifier</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>