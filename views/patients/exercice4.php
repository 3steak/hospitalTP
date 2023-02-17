<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Exercice 4</h1>
            <h2>Voici les clients qui ont une carte de fidélité :</h2>
            <div class="row">

                <?php foreach ($loyaltyClients as $loyaltyClient) {
                    echo '<div class="col-3 m-2 mx-auto">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <p class="card-text">' . $loyaltyClient->lastName . '' . $loyaltyClient->firstName . '</p>
                        </div>
                    </div>
                  </div>';
                } ?>

            </div>
        </div>
    </div>
</div>