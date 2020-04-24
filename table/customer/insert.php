<html>

<head>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/releases/qpy2aGtSgsYPZzCoYWjcaBCo/recaptcha__en_gb.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="stylesheet" href="../../css/insert.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script defer type="text/javascript" src="../../js/main.js"></script>
</head>

<body>

        <?php
        /**
         * Open a connection via PDO to insert a
         * customer and table with structure.
         */
        /**
         * all the inputs are placed into 
         * a $_POST array. 
         * it runs only if the form has been submitted.
         */
        if (isset($_POST['insert'])) {
            require "../../include/config.php";
            require "../../include/common.php";
            $statement = false;
            // $bew_customer = array(
            //     "customer_id"       => $_POST['customer_id'],
            //     "store_id"          => $_POST['store_id'],
            //     "first_name"         => $_POST['first_name'],
            //     "last_name"          => $_POST['last_name'],
            //     "email"             => $_POST['email'],
            //     "address_id"        => $_POST['address_id'],
            //     "active"            => $_POST['active'],
            //     "create_date"       => $_POST['create_date'],
            //     "last_update"       => $_POST['last_update']
            // );

            try {
                //#1 Open Connection
                $connection = new PDO($dsn, $username, $password, $options);
                //#2 Prepare Sql QUery 
                $statement = $connection->prepare("INSERT INTO customer (customer_id, store_id, first_name, last_name, email, address_id, active, create_date, last_update) VALUES (?,?,?,?,?,?,?,NOW(),NOW())");
                $statement->bindParam(1, $_POST['customer_id'], PDO::PARAM_INT);
                $statement->bindParam(2, $_POST['store_id'], PDO::PARAM_INT);
                $statement->bindParam(3, $_POST['first_name'], PDO::PARAM_STR);
                $statement->bindParam(4, $_POST['last_name'], PDO::PARAM_STR);
                $statement->bindParam(5, $_POST['email'], PDO::PARAM_STR);
                $statement->bindParam(6, $_POST['address_id'], PDO::PARAM_INT);
                $statement->bindParam(7, $_POST['active'], PDO::PARAM_INT);
                $statement->bindParam(8, $_POST['create_date'], PDO::PARAM_STR);
                $statement->bindParam(9, $_POST['last_update'], PDO::PARAM_STR);

                //$statement = $connection->prepare($sql);
                $statement->execute();

            } catch (PDOException $error) {
                echo "<br>" . $error->getMessage();
            }

            if (isset($_POST['insert']) && $statement) {
                echo '<p class="">Data successfully added</p>';
            } else {
                echo '<p class="">Please fill in all the details correctly</p>';
            } 

        }

        ?>
        
        <!-- <h2> <i class="fas fa-address-card" style="color:red; font-size: 70px"></i>Register a Student </h2> -->
        <div class="content">
            <h3 class="title">New Customer</h3>

            <form method="post" id="form">
                
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

                <div class="checkbox-div">
                    <h5>Active?</h5>
                    <input type="checkbox"  name="active" id="active" class="checkbox">
                    <span class="checkbox-custom"></span>
                </div>

                <input class="btn btn-primary" type="Submit" name="insert">
                <!-- <button type="button" onclick="validate_data()" class="btn btn-primary">Submit </button> -->
                <br>
                <a href="view.php" class="btn-back">BACK</a>
            </form>
        </div>
</body>
</html>