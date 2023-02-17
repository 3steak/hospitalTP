<?php

include_once(__DIR__ . '/../models/Client.php');
$twentyClients = getTwentyClients();
include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/client/exercice3.php');
