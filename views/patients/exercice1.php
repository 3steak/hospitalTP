<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Exercice 1</h1>
            <h2>Afficher les clients :</h2>
            <ul>
                <?php foreach ($clients as $client) {
                    echo "<li> $client->firstName</li>";
                } ?>

            </ul>
        </div>
    </div>
</div>