<div class="container form mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <div class="content">
                <h2 class="">Enregistrer un rendez-vous</h2>

                <form action="" method="post">

                    <!-- SELECT -->
                    <div class="field">
                        <select class="pe-2" name="idPatient">
                            <option value="">--Choisissez un patient--</option>
                            <?php foreach ($listPatients as  $patient) { ?>
                                <option value="<?= $patient->lastname ?>"><?= $patient->lastname ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <small><?= $error['firstname'] ?? '' ?></small>

                    <!-- DATEHOUR -->
                    <div class=" field">
                        <input class="pe-2" type="datetime-local" name="dateHour" value="<?= date('d-M-Y-H-i') ?>" required>

                    </div>
                    <small><?= $error['date'] ?? '' ?></small>

                    <button type="submit" class="mt-5 bouttonAdd">ENREGISTRER</button>
                </form>
            </div>
        </div>
    </div>
</div>