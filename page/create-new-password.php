<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAKILA Forgot Password</title>
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script defer type="text/javascript" src="../js/main.js"></script>
</head>
<body>
    <img src="../img/combined.png" alt="This is a background picture" class="wave">
            <?php
                //if the reset link is valid
                $selector = $_GET["selector"];
                $validator = $_GET["validator"];

                if (empty($selector) || empty($validator)){
                    echo "Couldn't validate your request!";
                }
                else{
                    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                        ?>
                            <div class="login-content">
                                <form action="../includes/reset-request.inc.php" method="post">
                                    <div class="div">
                                        <input type="hidden" name="selector" class="input" value="<?php echo $selector ?>">
                                        <input type="hidden" name="selector" class="input" value="<?php echo $validator ?>">
                                        
                                        <div class="input-div pass">
                                        <div class="i">
                                        </div>
                                        <div class="div">
                                        <h5>Enter your new Password here</h5>
                                        <input type="password" class="input" name="pwd">
                                        </div>
                                        </div>

                                        <div class="input-div pass">
                                        <div class="i">
                                        </div>
                                        <div class="div">
                                        <h5>Repeat it again here.</h5>
                                        <input type="password" class="input" name="pwd-repeat">
                                        </div>
                                        </div>
                                        
                                        <input type="submit" class="btn"  value="Send" name="reset-password-submit">
                                    </div>
                                </div>
                            </form>

                        <?php
                    }
                }

            ?>

            <div class="login-content">
            <h2 class="title">Enter your new password here!</h2>
                <form action="../includes/reset-request.inc.php" method="post">
                    <div class="input-div one">
                    <div class="i">
                            <div class="div">
                            <h5>JUST FILL IN YOUR EMAIL HERE</h5>
                            <input type="text" name="mail" class="input">
                            </div>
                    </div>
                    <input type="submit" class="btn"  value="Send" name="reset-request-submit">
                </form>

                <?php
                    if (isset($_GET["reset"])){
                        if($_GET["reset"] == "success"){
                            echo '<p class="signupsuccess">Check your e-mail!</p>';
                        }
                    }
                ?>
                
                <h2 class="title" style="font-size:13px;  color:rgb(73, 73, 73); ">An email will be on your way for you to reset password!</h2>
            
            </div>
        </div>
</body>
</head>