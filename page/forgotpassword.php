<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAKILA Forgot Password</title>
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
            <h2 class="title" style="font-size:26px; margin-top:150px; margin-bottom:0;">Forgot your password?</h2>
            <h2 class="title" style="font-size:26px; margin-top:0; margin-bottom: 150px;">No worry,We got your back. ツ
            </h2>
            <form action="../include/reset-request.inc.php" method="post">
                <div class="input-div one" style="margin-bottom: 100px;">
                    <div class="i">
                    </div>
                    <div class="div">
                        <h5>JUST FILL IN YOUR EMAIL HERE</h5>
                        <input type="text" name="email" class="input">
                    </div>
                </div>
                <input type="submit" class="btn" value="Send" name="reset-request-submit">
                <a href="../index.php"  class="btn-back"  name="back">Back</a>
            </form>

            <?php
                    if (isset($_GET["reset"])){
                        if($_GET["reset"] == "success"){
                            echo '<p class="signupsuccess">Check your e-mail!</p>';
                        }
                    }
                ?>

            <h2 class="title" style="font-size:13px;  color:rgb(73, 73, 73); ">An email will be on your way for you to
                reset password!</h2>

        </div>
    </div>
</body>
</head>