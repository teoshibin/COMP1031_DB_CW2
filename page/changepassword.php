<?php
require "../include/changepassword.inc.php";
require_once "../include/header.php";
?>

<link rel="stylesheet" href="../css/insert.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
<script defer type="text/javascript" src="../js/main.js"></script>

<div class="content-background" style="background-color: rgb(40,39,39); height: 100vh; opacity: 0.8;">
    <div class="login-content">
        <h2 class="title" style="margin-left:6%; margin-top: 25%;">Change Password</h2>
        <!-- <h5 style="margin-left:15%; margin-bottom:5%;">Please fill out this form to change your password.</h5> -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="input-div pass">
                <div class="i">
                </div>
                <div class="div">
                    <h5>Current Password</h5>
                    <input type="password" name="old_password" class="input form-control <?php echo (!empty($old_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $old_password; ?>">
                    <div class="invalid-feedback">
                        <big><?php echo $old_password_err; ?></big>
                    </div>
                </div>
            </div>

            <div class="input-div pass">
                <div class="i">
                </div>
                <div class="div">
                    <h5>New Password</h5>
                    <input type="password" name="new_password" class="input form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                    <div class="invalid-feedback">
                        <big><?php echo $old_password_err; ?></big>
                    </div>
                </div>
            </div>

            <div class="input-div pass">
                <div class="i">
                </div>
                <div class="div">
                    <h5>Repeat New Password</h5>
                    <input type="password" name="confirm_password" class="input form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <big><?php echo $old_password_err; ?></big>
                    </div>
                </div>
            </div>

            <input type="submit" class="btn" value="Submit" style="margin-bottom: 15px;">
            <a class="btn-back" href="/DB_CW2/">Back</a>
        </form>
    </div>
</div>

<?php
require_once "../include/footer.php";
?>