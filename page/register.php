<?php

// Include config file
require_once "../include/config.php";
require_once "../include/test_input.php";

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
        $sql = "INSERT INTO staff (first_name, last_name, email, username, password) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_first_name, $param_last_name, $param_email, $param_username, $param_password);

            // Set parameters
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            $param_email = $email;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);        

}
?>

<?php
require_once('../include/header.php');
?>
<div class="my-body" id="anchor">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="main.php">Home</a></li>
            <li class="breadcrumb-item"><a href="login.php#anchor-1">Login</a></li>
            <li class="breadcrumb-item active" aria-current="page">Register</li>
        </ol>
    </nav>
    <div class="my-form">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control  <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name; ?>" placeholder="Enter first name">
                    <div class="invalid-feedback">
                        <big><?php echo $first_name_err; ?></big>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control  <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $last_name; ?>" placeholder="Enter last name">
                    <div class="invalid-feedback">
                        <big><?php echo $last_name_err; ?></big>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control  <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="Enter email   e.g. someone@example.com">
                <div class="invalid-feedback">
                    <big><?php echo $email_err; ?></big>
                </div>
            </div>

            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="e.g 1234 Main St">
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Country</label>
                    <select id="country" class="form-control">
                        <option selected>None</option>
                        <option>China</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>City</label>
                    <select id="city" class="form-control">
                        <option selected>None</option>
                        <option>wuhan</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputZip">Post Code</label>
                    <input type="text" class="form-control" id="inputZip">
                </div>
            </div>


            <!-- user login credentials -->
            <div class="form-group mt-lg-5">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Enter login username">
                <div class="invalid-feedback">
                    <big><?php echo $username_err; ?></big>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Password</label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" placeholder="Enter password">
                    <div class="invalid-feedback">
                        <big><?php echo $password_err;?></big>
                    </div>
                </div>
    
                <div class="form-group col-md-6">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" placeholder="Re-enter Password">
                    <div class="invalid-feedback">
                        <big><?php echo $confirm_password_err; ?></big>
                    </div>
                </div>
            </div>


            <div class="form-group mt-lg-5">
                <input type="submit" class="btn btn-dark" value="Submit">
                <input type="reset" class="btn btn-outline-dark" value="Undo">
            </div>
            <p>Already have an account? <a href="login.php#anchor-1">Login here</a>.</p>
        </form>
    </div>
</div>

<?php
require_once "../include/footer.php";
?>