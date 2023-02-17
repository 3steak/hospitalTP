<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Exercice 3</h1>
            <h2 class="text-center">Afficher les 20 premiers clients :</h2>
            <div class="row">

                <?php foreach ($twentyClients as $twentyClient) {

                    echo '<div class="col-4 m-2 mx-auto">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">' . $twentyClient->lastName . '' . $twentyClient->firstName . '</p>
                            </div>
                        </div>
                          </div>';
                } ?>
                </ul>
            </div>
        </div>
    </div>
</div>