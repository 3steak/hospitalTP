<?php

include_once(__DIR__ . '/../models/Showtype.php');
$showtypes = getShowtypes();
include_once(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/showtype/exercice2.php');
