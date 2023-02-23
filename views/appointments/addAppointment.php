<div class="container form mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <div class="content">
                <h2 class="">Enregistrer un rendez-vous</h2>

                <form action="" method="post">

                    <!-- SELECT -->
                    <div class="field">
                        <select class="pe-2" name="idPatient">
                            <option value="">Choisissez un patient</option>
                            <?php foreach ($listPatients as  $patient) { ?>
                                <option value="<?= $patient->id ?>"><?= $patient->lastname ?> 💊 <?= $patient->firstname ?> ◼ <?= $patient->mail ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <small><?= $error['idPatient'] ?? '' ?></small>

                    <!-- DATE -->
                    <div class=" field">
                        <input class="pe-2" type="date" name="date" value="" required>
                    </div>
                    <small><?= $error['date'] ?? '' ?></small>
                    <!-- HOUR -->
                    <div class=" field">
                        <input class="pe-2" type="time" name="hour" value="" min="09:00" max="18:00" step="1800" required>
                    </div>
                    <small><?= $error['hour'] ?? '' ?></small>

                    <button type="submit" class="mt-5 bouttonAdd">ENREGISTRER</button>
                </form>
            </div>
        </div>
    </div>
</div>