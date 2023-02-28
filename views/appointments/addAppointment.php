<div class="container form mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <div class="content mx-auto">
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
                        <select class="pe-2" name="hour">
                            <option value="">Choisissez une horaire</option>
                            <?php
                            $h = 9;
                            $m = 0;
                            $step = 30;
                            $end = 18;
                            while ($h < $end) { ?>
                                <option value="<?= strval($h) ?>:<?= ($m == 0) ? '00' : strval($m) ?>"> <?= $h ?>h<?= ($m == 0) ? '00' : strval($m) ?></option>

                            <?php
                                if ($m == 0) {
                                    $m += $step;
                                } else {
                                    $h++;
                                    $m = 0;
                                }
                            }
                            ?>


                        </select>
                    </div>
                    <small><?= $error['hour'] ?? '' ?></small>
                    <small><?= $error['apt'] ?? '' ?></small>

                    <button type="submit" class="mt-5 bouttonAdd">ENREGISTRER</button>
                </form>
            </div>
        </div>
    </div>
</div>