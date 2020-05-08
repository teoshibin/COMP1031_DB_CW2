<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'sakila');// #TODO create database called login with a table named user

$host = "localhost";
$username = "root";
$password = "";
$dbname = "sakila";
$dsn = "mysql:host=$host;dbname=$dbname";
$options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

 
/* Attempt to connect to MySQL database */
// $link = mysqli_connect("hostname", "username", "password", "database");
// $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// // Check connection
// if($link === false){
//     die("ERROR: Could not connect. " . mysqli_connect_error());//print error return from .mysqli_connect_error close this script
// }
?>

<!-- <?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'hcyko2_admin');
define('DB_PASSWORD', '@@nottinghamdbcw2');
define('DB_NAME', 'hcyko2_sakila');// #TODO create database called login with a table named user
 
// $host = "localhost";
// $username = "root";
// $password = "";
// $dbname = "sakila";
// $dsn = "mysql:host=$host;dbname=$dbname";
// $options = array(
//             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//             );
$host = "localhost";
$username = "hcyko2_admin";
$password = "@@nottinghamdbcw2";
$dbname = "hcyko2_sakila";
$dsn = "mysql:host=$host;dbname=$dbname";
$options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
 
 
/* Attempt to connect to MySQL database */
// $link = mysqli_connect("hostname", "username", "password", "database");
// $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// // Check connection
// if($link === false){
//     die("ERROR: Could not connect. " . mysqli_connect_error());//print error return from .mysqli_connect_error close this script
// }
?> -->