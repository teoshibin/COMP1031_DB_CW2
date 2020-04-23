<?php
        require "../include/register.inc.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAKILA Signup</title>
    <link rel="stylesheet" href="../css/signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script defer type="text/javascript" src="../js/main.js"></script>
</head>
<body>
    <img src="../img/combined.png" alt="This is a background picture" class="wave">
            <div class="container">
                <div class="img">
                    <img src="#" alt="">
                </div>
                <div class="login-content">

                    <h2 class="title">Sign up form</h2>
                    <!--input error checking(user terms) -->
                    <!-- #TODO -->

                    
                    <!-- setting a form and ask for input -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="input-div one">
                        <div class="i">
                        <i class="fas fa-user-circle"></i>
                        </div>
                        <div class="div">
                        <h5>First name</h5>
                        <input type="text" name="first_name" class="input">
                        </div>
                        </div>

                    <div class="input-div one">
                        <div class="i">
                        <i class="far fa-user-circle"></i>
                        </div>
                        <div class="div">
                        <h5>Last name</h5>
                        <input type="text" name="last_name" class="input">
                        </div>
                        </div>
                        
                    <div class="input-div one">
                        <div class="i">
                        <i class="fas fa-map-pin"></i>
                        </div>
                        <div class="div">
                        <h5>Address</h5>
                        <input type="text" name="address_id" class="input">
                        </div>
                        </div>

                    <div class="input-div one">
                        <div class="i">
                        <i class="fas fa-flag"></i>
                        </div>
                        <div class="div">
                        <h5>Country</h5>
                        <input type="form-control" name="country" class="input">
                        </div>
                        </div>

                    <div class="input-div one">
                        <div class="i">
                        <i class="fas fa-city"></i>
                        </div>
                        <div class="div">
                        <h5>City</h5>
                        <input type="form-control" name="city" class="input">
                        </div>
                        </div>

                    <div class="input-div one">
                        <div class="i">
                        <i class="fab fa-slack-hash"></i>
                        </div>
                        <div class="div">
                        <h5>Postal Code</h5>
                        <input type="form-control" name="post" class="input">
                        </div>
                        </div>

                    <div class="input-div one">
                        <div class="i">
                        <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                        <h5>Username</h5>
                        <input type="text" name="username" class="input">
                        </div>
                        </div>

                    <div class="input-div one">
                        <div class="i">
                        <i class="fas fa-at"></i>
                        </div>
                        <div class="div">
                        <h5>Email</h5>
                        <input type="text" name="email" class="input">
                        </div>
                        </div>

                    <div class="input-div pass">
                        <div class="i">
                        <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">
                        <h5>Password</h5>
                        <input type="password" name="password" class="input" >
                        </div>
                        </div>
                    
                    <div class="input-div pass">
                        <div class="i">
                        <i class="fas fa-redo-alt"></i>
                        </div>
                        <div class="div">
                        <h5>Repeat Password</h5>
                        <input type="password" name="confirm_password" class="input">
                        </div>
                        </div>

                    <input type="submit" class="btn"  value="Sign up" name="signup-submit">
                    <input type="submit" class="btn-back"  value="Back" name="back">
                    </form>

                    </div>
                    </div>
</body>

