<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'hcyko2_admin');
define('DB_PASSWORD', '@@nottinghamdbcw2');
define('DB_NAME', 'hcyko2_sakila');

$host = "localhost";
$username = "hcyko2_admin";
$password = "@@nottinghamdbcw2";
$dbname = "hcyko2_sakila";
$dsn = "mysql:host=$host;dbname=$dbname";
$options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

?>