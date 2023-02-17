<?php

require_once(__DIR__ . '/../models/Client.php');
$loyaltyClients = getLoyaltyClients();
include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/client/exercice4.php');
