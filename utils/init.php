<?php

ini_set('display_errors', 1);// 1 montre les erreurs 0 montre pas les erreurs 
ini_set('error_reporting', E_ALL);// E_ALL renvoit toutes les erreurs warning, fatale...
// or error_reporting(E_ALL);

//on définit des constantes pour appeller les scripts qqsoit le dossier de travail
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));//on remplace index.php par ''
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

// echo $_SERVER['SCRIPT_FILENAME'];
// echo "<br>";
// echo $_SERVER['SCRIPT_NAME'];
// echo "<br>";
// echo "<br>";


// echo ROOT;
// echo "<br>";
// echo WEBROOT;
// echo "<br>";