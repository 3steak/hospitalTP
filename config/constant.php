<?php
// Adresse de la base
define('DB_HOST', '127.0.0.1');

// Nom de la base de données
define('DB_NAME', 'hospitale2n');

// Nom de l'utilisateur MySQL
define('DB_USER', 'doctor_project');

// Mot de passe de l'utilisateur
define('DB_PASS', 'qnFybgQ98kEaqHzL');


// REGEX 
define("REGEX_NO_NUMBER", "^[a-zA-ZÀ-ÿ' \-]{2,20}$");
// REGEX LINKEDIN
// Linkedin moins restrictive
define('REGEXP_LINKEDIN', "^https:\/\/www.linkedin.com\/in\/([a-z]+)-([a-z]+)-([a-z0-9]+)\/$");

// Birthday
define('REGEXP_BIRTHDAY', "^((19\d{2}|20[01]\d|202[1-9])\-(0[1-9]|1[0-2])\-(0[1-9]|[12][0-9]|3[01]))$");

// HOUR
define('REGEXP_HOUR', "^((09|1[0-8]):(00|30))$");

// Phone 
define('REGEXP_PHONE_NUMBER', '^(0[1-9]{1})(\d{8})$');
