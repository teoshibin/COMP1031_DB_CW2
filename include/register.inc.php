<?php
// Include config file
require_once "../include/config.php";
require_once "../include/test_input.php";

if (isset($_POST['back'])){
    header("Location:  ../index.php");
    exit();
}

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error()); //print error return from .mysqli_connect_error close this script
}

// Define variables and initialize with empty values
$first_name = $last_name = $address_id = $email = $store_id = $username = $password = $confirm_password = "";
$first_name_err = $last_name_err = $address_id_err = $email_err = $store_id_err = $username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate first_name
    if (empty(trim($_POST["first_name"]))) {
        $first_name_err = "Please enter your first name.";
    } else if (!preg_match("/^[a-zA-Z\s]+$/", trim($_POST["first_name"]))){
        $first_name_err = "First name only contain letters.";
    } else {
        $first_name = test_input($_POST["first_name"]);
    }

    // Validate last_name
    if (empty(trim($_POST["last_name"]))) {
        $last_name_err = "Please enter your last name.";
    } else if (!preg_match("/^[a-zA-Z\s]+$/", trim($_POST["last_name"]))){
        $last_name_err = "Last name only contain letters.";
    } else {
        $last_name = test_input($_POST["last_name"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else if (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format";
    } else {
        $email = test_input($_POST["email"]);
    }

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        // Prepare a select statement
        $sql = "SELECT staff_id FROM staff WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($first_name_err) && empty($last_name_err) && empty($email_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO staff (staff_id, first_name, last_name, address_id, picture, email, store_id, active,  username, password, last_update) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ? , NOW())";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "issibsiiss",$param_staff_id, $param_first_name, $param_last_name, $param_address_id, $param_picture, $param_email, $param_store_id, $param_active,  $param_username, $param_password);

            // Set parameters
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            $param_address_id = 1;
            $param_picture = $picture;
            $param_email = $email;
            $param_store_id = 1;
            $param_active = 0;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: ../page/login.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    } 
    // else {
    //     mysqli_close($link);
    //     header("location: ../page/register.php");
    // }
    // Close connection
    mysqli_close($link);        

}

?>