<div class="container form mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <div class="content">
                <h2 class="">Rendez vous de <?= htmlspecialchars($appointment->lastname)  ?> <?= htmlspecialchars($appointment->firstname) ?></h2>
                <div class="d-fex flex-column">
                    <p class="modifExplain">Cliquer sur le boutton ci-dessous pour accéder à la modification</p>
                    <a class="triggerUdpdate"><i class="fa-solid fa-pen-to-square fa-2xl "></i></a>
                </div>
                <form action="" method="post">
                    <fieldset disabled>
                        <div class="">

                            <div class="">
                                <label for="disabledTextInput" class="form-label">Disabled input</label>
                                <h4 class=" text-start ">Patient</h4>
                                <!-- SELECT PATIENT -->
                                <select class="pe-2" id="disabledTextInput" name="idPatient">
                                    <?php foreach ($listPatients as  $patient) { ?>
                                        <option <?php echo ($patient->id === $appointment->idPatients) ? 'selected' : '' ?> value="<?= $patient->id ?>"><?= $patient->lastname ?> 💊 <?= $patient->firstname ?> ◼ <?= $patient->mail ?></option>
                                    <?php   } ?>
                                </select>
                            </div>
                            <small><?= $error['idPatient'] ?? '' ?></small>

                            <!-- DATE -->
                            <div class="">
                                <label for="disabledTextInput" class="form-label">Disabled input</label>
                                <h4 class=" text-start">Date du rdv</h4>
                                <input type="date" id="disabledTextInput" name="date" value="<?= htmlspecialchars(date('Y-m-d', strtotime($appointment->dateHour))) ?>">
                            </div>
                            <small><?= $error['date'] ?? '' ?></small>

                            <!-- HOUR -->
                            <div class="">
                                <label for="disabledTextInput" class="form-label">Disabled input</label>
                                <h4 class=" text-start">Heure du rdv</h4>
                                <input type="time" id="disabledTextInput" name="hour" value="<?= htmlspecialchars(date('H:i', strtotime($appointment->dateHour))) ?>">
                            </div>
                            <small><?= $error['time'] ?? '' ?></small>
                            <button type="submit" class="btn btn-primary btnUpdate">Modifier</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>