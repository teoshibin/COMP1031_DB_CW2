<?php
ob_start();
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { //isset prevent user from editing url to get in the logged in page
    header("location: ../page/home.php"); // redirect function in php
    exit();
}
require_once "../include/config.php"; //link
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error()); //print error return from .mysqli_connect_error close this script
}
$username = $password = "";
$username_err = $password_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo ('1 ');
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }
    if (empty($username_err) && empty($password_err)) {
        echo ('2 ');
        $sql = "SELECT staff_id, username, password, first_name, last_name FROM staff WHERE username = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            echo ('3 ');
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            if (mysqli_stmt_execute($stmt)) {
                echo ('4 ');
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {    //only one set of user info can appear in result
                    echo ('5 ');
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $first_name, $last_name);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            echo ('6 ');
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["first_name"] = $first_name;
                            $_SESSION["last_name"] = $last_name;
                            header("location: ../page/home.php");
                            exit();
                        } else {
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    $username_err = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($link);
}
