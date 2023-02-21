<div class="container form mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <div class="content">
                <h2 class="">Ajouter un patient</h2>

                <?= $error['email'] ?? '' ?>

                <form action="" method="post">
                    <!-- LASTNAME -->
                    <div class="field">
                        <span class="fa fa-user"></span>
                        <input type="text" name="lastname" placeholder="Nom" value="<?= $lastname ?? '' ?>" pattern="<?= REGEX_NO_NUMBER ?>" required>
                    </div>
                    <small><?= $error['lastname'] ?? '' ?></small>
                    <!-- FIRSTNAME -->
                    <div class=" field">
                        <span class="fa-regular fa-user"></span>
                        <input type="text" name="firstname" placeholder="Prénom" value="<?= $firstname ?? '' ?>" pattern="<?= REGEX_NO_NUMBER ?>" required>
                    </div>
                    <small><?= $error['firstname'] ?? '' ?></small>

                    <!-- BIRTHDATE -->
                    <div class=" field">
                        <input class="pe-2" type="date" name="birthdate" value="<?= $birthdate ?? '' ?>" required>
                        </label>
                    </div>
                    <small><?= $error['date'] ?? '' ?></small>

                    <!-- PHONE -->
                    <div class="field">
                        <span class="fa-solid fa-mobile-screen-button"></span>
                        <input type="tel" name="phone" maxlength="10" placeholder="Tel" value="<?= $phone ?? '' ?>" pattern="<?= REGEXP_PHONE_NUMBER ?>" required>
                    </div>
                    <small><?= $error['phone'] ?? '' ?></small>

                    <!-- MAIL -->
                    <div class=" field">
                        <span class="fa-solid fa-at"></span>
                        <input type="email" name="mail" maxlength="100" placeholder="Email" value="<?= $mail ?? '' ?>" required>
                    </div>
                    <small><?= $error['mail'] ?? '' ?></small>

                    <button type="submit" class="mt-5 bouttonAdd">AJOUTER</button>
                </form>
            </div>
        </div>
    </div>
</div>