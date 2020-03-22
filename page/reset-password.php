<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "../include/config.php";

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());//print error return from .mysqli_connect_error close this script
}
 
// Define variables and initialize with empty values
$new_password = $confirm_password = $old_password = "";
$new_password_err = $confirm_password_err = $old_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check original password is empty
    if(empty(trim($_POST["old_password"]))){
        $old_password_err = "Please enter your current password.";
    } else{
        $old_password = trim($_POST["old_password"]);
    }

    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err) && empty($old_password_err)){

        
        session_start();
        
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $_SESSION["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){    //only one set of user info can appear in result                
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($old_password, $hashed_password)){
                            
                            // Prepare an update statement
                            $sql = "UPDATE users SET password = ? WHERE id = ?";
        
                            if($stmt = mysqli_prepare($link, $sql)){
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
                                
                                // Set parameters
                                $param_password = password_hash($new_password, PASSWORD_DEFAULT);
                                $param_id = $_SESSION["id"];
                                
                                // Attempt to execute the prepared statement
                                if(mysqli_stmt_execute($stmt)){
                                    // Password updated successfully. Destroy the session, and redirect to login page
                                    session_destroy();
                                    header("location: login.php");
                                    exit();
                                } else{
                                    echo "Oops! Something went wrong. Please try again later.";
                                }

                                // Close statement
                                mysqli_stmt_close($stmt);
                            }
                            
                            // Redirect user to welcome page
                            header("location: inner-main.php");
                        } else{
                            // Display an error message if password is not valid
                            $old_password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    echo "Oops! SSomething went wrong. Please contact help services to fix this issue.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
    require_once "../include/header.php";
?>
    <div class="my-body" id="anchor">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="inner-main.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Password Setting</li>
            </ol>
        </nav>

        <div class="my-form">
            <h2>Reset Password</h2>
            <p>Please fill out this form to change your password.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Original Password</label>
                    <input type="password" name="old_password" class="form-control <?php echo (!empty($old_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $old_password; ?>" placeholder="Current Password">
                    <div class="invalid-feedback">
                        <big><?php echo $old_password_err; ?></big>
                    </div>
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>" placeholder="New Password">
                    <div class="invalid-feedback">
                        <big><?php echo $new_password_err; ?></big>
                    </div>
                </div>
                <div class="form-group">
                    <label>Confirm New Password</label>
                    <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" placeholder="Comfirm New Password">
                    <div class="invalid-feedback">
                        <big><?php echo $confirm_password_err; ?></big>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-dark" value="Submit">
                    <a class="btn btn-outline-dark" href="inner-main.php">Cancel</a>
                </div>
            </form>
        </div>
    </div> 
<?php
    require_once "../include/footer.php";
?>