
 
<?php
    require "../include/changepassword.inc.php";
    require_once "../include/header.php";
?>
    <div class="my-body" id="anchor">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="inner-main.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Password Setting</li>
            </ol>
        </nav>

        <div class="login-content">
            <h2>Change Password</h2>
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
                    <a class="btn btn-outline-dark" href="/DB_CW2/">Back</a>
                </div>
            </form>
        </div>
    </div> 
<?php
    require_once "../include/footer.php";
?>

                        <div class="input-div pass">
                        <div class="i">
                        </div>
                        <div class="div">
                        <h5>Current Password</h5>
                        <input type="password" name="old_password" class="form-control <?php echo (!empty($old_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $old_password; ?>" placeholder="Current Password">
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
                        <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>" placeholder="New Password">
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
                        <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" placeholder="Comfirm New Password">
                        <div class="invalid-feedback">
                        <big><?php echo $old_password_err; ?></big>
                        </div>
                        </div>
                        </div>