<div class="container dark-mode">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center text-white mt-4">Exercice 6</h1>
            <h2 class="text-white m-4">Les spectacles par ordre alphabétique.
            </h2>
            <input type="checkbox" class="checkbox m-4" id="checkbox">
            <label for="checkbox" class="switch"></label>
            <div class="row">
                <?php foreach ($shows as $show) {
                    $showDate =  datefmt_format(DATE_FORMATTER, strtotime($show->date));
                    echo '<div class="col-12 col-lg-4 m-2 mx-auto text-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                        <h5 class="card-title"> Spectacle ' . $show->title  . '</h5>
                            <p class="card-text">Réalisé par <span>' . $show->performer . '</span> le ' . $showDate . ' à ' . $show->startTime . '</p>
                        </div>
                    </div>
                  </div>';
                } ?>
            </div>
        </div>
    </div>
</div>