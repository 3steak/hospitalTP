<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Exercice 5</h1>
            <h2>Voici les clients dont le nom commence par M et classé par ordre alphabétique :</h2>
            <div class="row">
                <?php foreach ($mClients as $mClient) {

                    echo '<div class="col-3 m-2 mx-auto text-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <p class="card-text"> Nom : ' . $mClient->lastName  . '<br>Prénom : ' . $mClient->firstName . '</p>
                        </div>
                    </div>
                  </div>';
                } ?>
            </div>
        </div>
    </div>
</div>