<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: /DB_CW2/page/login.php");
    exit;
}
?>
