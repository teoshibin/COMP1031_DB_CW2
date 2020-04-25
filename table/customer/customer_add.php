<html>
<head>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="../../css/insert.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/releases/qpy2aGtSgsYPZzCoYWjcaBCo/recaptcha__en_gb.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script defer type="text/javascript" src="../../js/main.js"></script>
</head>
    <!-- <h2> <i class="fas fa-address-card" style="color:red; font-size: 70px"></i>Register a Student </h2> -->
    <div class="content">
            <h3 class="title">New Customer</h3>

            <form method="post" action="customer_add.inc.php "id="form" onclick="return ValidateForm()">
                
                <div class="input-div">
                    <div class="i">
                    </div>
                    <div class="div">
                    <h5>First name</h5>
                    <input type="text" name="first_name" id="first_name" class="input">
                    </div>
                </div>

                <div class="input-div">
                    <div class="i">
                    </div>
                    <div class="div">
                    <h5>Last name</h5>
                    <input type="text" name="last_name" id="last_name" class="input">
                    </div>
                </div>

                <div class="input-div">
                    <div class="i">
                    </div>
                    <div class="div">
                    <h5>E-mail</h5>
                    <input type="text" name="email" id="email" class="input">
                    </div>
                </div>

                <div class="input-div">
                    <div class="i">
                    </div>
                    <div class="div">
                    <h5>Address ID</h5>
                    <input type="text" name="address_id" id="address_id" class="input">
                    </div>
                </div>

                <div class="input-div">
                    <div class="i">
                    </div>
                    <div class="div">
                    <h5>Store ID</h5>
                    <input type="text" name="store_id" id="store_id" class="input">
                    </div>
                </div>


                <h5 class="active-label">Active?</h5>
                <div class="toggle">
                    <input type="radio" name="sizeBy" value="weight" id="sizeWeight" checked="checked" />
                    <label for="sizeWeight">Yes</label>
                    <input type="radio" name="sizeBy" value="dimensions" id="sizeDimensions" />
                    <label for="sizeDimensions">No</label>
                </div>

                <input class="btn btn-primary" type="Submit" name="insert" onclick="return ">

                <br>
                <a href="customer.php" class="btn-back">BACK</a>
            </form>
</div>


</body>
</html>