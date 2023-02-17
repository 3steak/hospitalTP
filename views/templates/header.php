<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="/public/assets/js/script.js"></script>
    <title>Hospital</title>
</head>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid navup">
        <a class="navbar-brand" href="/controllers/homeCtrl.php"><img src="/public/assets/img/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/addPatientCtrl.php">Ajouter un patient</a>
                </li>
                <div class="barreco"></div>
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/listPatientsCtrl.php">Liste des patients</a>
                </li>
                <div class="barreco"></div>
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/clientsCtrl.php">Profil patients</a>
                </li>
                <div class="barreco"></div>
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/clientsCtrl.php">Rendez-vous</a>
                </li>
                <div class="barreco"></div>
            </ul>
        </div>
    </div>
</nav>

<body>