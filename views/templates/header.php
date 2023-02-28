<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    <title>Hospital</title>
</head>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid navup">
        <a class="navbar-brand" href="/controllers/homeCtrl.php"><img src="/public/assets/img/pillule.png" alt="logo hopital" class="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/AddPatient">Ajouter un patient</a>
                </li>
                <div class="barreco d-lg-none"></div>
                <li class="nav-item">
                    <a class="nav-link" href="/ListPatients">Liste des patients</a>
                </li>
                <div class="barreco d-lg-none"></div>
                <li class="nav-item">
                    <a class="nav-link" href="/AddAppointment">Ajouter un rendez-vous</a>
                </li>
                <div class="barreco d-lg-none"></div>
                <li class="nav-item">
                    <a class="nav-link" href="/ListAppointments">Liste des rendez-vous</a>
                </li>
                <div class="barreco d-lg-none"></div>
                <li class="nav-item">
                    <a class="nav-link" href="/AddPatientApt">Ajouter un patient avec son rendez-vous</a>
                </li>
                <div class="barreco d-lg-none"></div>
            </ul>
        </div>
    </div>
</nav>

<body>