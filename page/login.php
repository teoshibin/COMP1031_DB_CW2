<?php
        require "../include/login.inc.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAKILA Login Page</title>
    <!-- css/link reference/javascript -->
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script defer type="text/javascript" src="../js/main.js"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
    <img src="../img/combined.png" alt="This is a background picture" class="wave">
        <div class="container">
            <div class="img">
                <img src="#" alt="">
            </div>
            <div class="login-content">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <img class="avatar" src="../img/avatar.svg" alt="avatar icon">
                    <h2 class="title">Welcome to SAKILA</h2>
                    <div class="input-div one">
                        <div class="i">
                        <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                        <h5>Username</h5>
                        <input type="text" name="username" class="input">
                        </div>
                    </div>
                    <div class="input-div pass">
                        <div class="i">
                        <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">
                        <h5>Password</h5>
                        <input type="password" name="password" class="input">
                        </div>
                    </div>
                    <a href="register.php">Register Here.</a>
                    <a href="forgotpassword.php">Forgot Password?</a>
                    <input type="submit" class="btn" value="Login" name="login-submit">
                </form>
                    <?php
                        // password changed notifcation
                        // if (isset($_GET["newpwd"])){
                        //     if($_GET["newpwd"] == "passwordupdated"){
                        //         echo '<p class="signupsucess"> Your password has been reset!</p>';
                        //     }
                        // }
                    ?>
            </div>
        </div>               
</body>
</html>
