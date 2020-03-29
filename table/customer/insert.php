<html>
<head>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous"> -->
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" type="text/css">
    <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/releases/qpy2aGtSgsYPZzCoYWjcaBCo/recaptcha__en_gb.js"></script><script src="https://www.google.com/recaptcha/api.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<style>

.error{
		border: 1px solid blue;
	}
	.required{
		color:red;
	}
	.succ{
		color:green;
	}
	body{
		font-family: 'Open Sans', sans-serif;
	}
</style>
</head>

<body style="background-color:white" data-gr-c-s-loaded="true">
<div class="col-lg-3"></div>

<div class="col-lg-6 table-responsive" style="border: 10px solid #db3f34; padding: 10px; ">
<span style="text-align: center;padding-bottom: 0px;"><br>
<center>
    <h3><strong>New Customer </strong></h3>
</center>

</span>

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
if(isset($_POST['insert'])){
    require "../../config.php";
    require "../../common.php";
    $statement=false;
    $bew_customer = array(
        "customer_id"       => $_POST['customer_id'],
        "store_id"          => $_POST['store_id'],
        "first_name"         => $_POST['first_name'],
        "last_name"          => $_POST['last_name'],
        "email"             => $_POST['email'],
        "address_id"        => $_POST['address_id'],
        "active"            => $_POST['active'],
        "create_date"       => $_POST['create_date'],
        "last_update"       => $_POST['last_update'],

    );

    try{
        //#1 Open Connection
        $connection = new PDO ($dsn,$username,$password,$options);
        //#2 Prepare Sql QUery 
        $statement = $connection->prepare("INSERT INTO customer (customer_id, store_id, first_name, last_name, email, address_id, active, create_date, last_update) 
        VALUES (?,?,?,?,?,?,?,NOW(),NOW())");
        $statement ->bindParam(1,$_POST['customer_id'],PDO::PARAM_STR);
        $statement ->bindParam(2,$_POST['first_name'],PDO::PARAM_STR);
        $statement ->bindParam(3,$_POST['last_name'],PDO::PARAM_STR);
        $statement ->bindParam(4,$_POST['email'],PDO::PARAM_STR);
        $statement ->bindParam(5,$_POST['address_id'],PDO::PARAM_STR);
        $statement ->bindParam(6,$_POST['active'],PDO::PARAM_STR);
        $statement ->bindParam(7,$_POST['create_date'],PDO::PARAM_STR);
        $statement ->bindParam(8,$_POST['last_update'],PDO::PARAM_STR);


        //$statement = $connection->prepare($sql);
        $statement->execute();
    }   catch (PDOException $error){
            echo "<br>".$error->getMessage();
        }
}
?>


<?php if (isset($_POST['insert']) && $statement) { ?>
  <?php echo 'Data successfully added'; ?> 
<?php }else{
    echo 'Please fill in all the details correctly';
} ?>
    <!-- <h2> <i class="fas fa-address-card" style="color:red; font-size: 70px"></i>Register a Student </h2> -->
<div>
    <form  method ="post" id="form">

            <label for= "first_name"> First Name </label>
        <p>
            <input type= "text" name="first_name" id = "first_name" >
        </p>

            <label for="last_name">Last Name </label>
        <p>
            <input type="text" name="last_name" id="last_name">
        </p>

            <label for="email">Email Address</label>
        <p>
            <input type="text" name="email" id="email">
        </p>

            <label for="address_id"> Address ID </label>
        <p>
            <input type="number" name="address_id" id="address_id">
        </p>

        <label for="store_id"> Store ID </label>
        <p>
        <input type="number" name="store_id" id="store_id">
        </p>

        <label for="active"> Active </label>
        <p>
        <input type="number" min="0' max="1" name="active" id="active">
        </p>

        <p>
        <input class="btn btn-primary" type="insert" name="insert" id="insert" role="insert"  value="Insert"> 
        </p>
        <!-- <button type="button" onclick="validate_data()" class="btn btn-primary">Submit </button> -->
    </form>
</div>
    <center>
    <a href="view.php#anchor"> Main Page </a>
    </center>


</body>
</html>