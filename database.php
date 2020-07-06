<?php
define('DATABASE', 'leaz_ampoule');
define('USER', 'leaz');
define('PWD' , 'oEPq/K1H9B21gQ==');
define('HOST', 'localhost');

try {
    $dbh = new PDO('mysql:host='.HOST.';dbname='.DATABASE, USER, PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>