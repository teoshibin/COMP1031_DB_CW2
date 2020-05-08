<?php
        require "../include/login.inc.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sakila the film renting website">
    <meta name="keywords" content="Sakila, sakila database, sakila website">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAKILA Login Page</title>
    <!-- css/link reference/javascript -->
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script defer type="text/javascript" src="../js/main.js"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="apple-touch-icon" sizes="57x57" href="/DB_CW2/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/DB_CW2/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/DB_CW2/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/DB_CW2/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/DB_CW2/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/DB_CW2/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/DB_CW2/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/DB_CW2/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/DB_CW2/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/DB_CW2/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/DB_CW2/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/DB_CW2/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/DB_CW2/favicon/favicon-16x16.png">
    <link rel="manifest" href="/DB_CW2/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165886203-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-165886203-1');
    </script>
</head>
<body>
    <img src="../img/combined.png" alt="This is a background picture" class="wave">
        <div class="container">
            <div class="img">
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

            </div>
        </div>               
</body>
</html>
