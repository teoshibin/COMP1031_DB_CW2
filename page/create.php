<html>
<head>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
</head>
<body>
<?php 

/**
 * Open a connection via PDO to create a
 * new database and table with structure.
 */
/**
 * all the inputs are placed into 
 * a $_POST array. 
 * it runs only if the form has been submitted.
 */
//print_r($_POST);

if(isset($_POST['submit'])){
    require "../include/config.php";
    require "../include/common.php";
    $statement=false;
    $new_student = array(
        "firstname"     => $_POST['firstname'],
        "lastname"      => $_POST['lastname'],
        "email"         => $_POST['email'],
        "age"           => $_POST['age'],
        "address"       => $_POST['address'],
        "school"        => $_POST['school']

    );

    try{
        //#1 Open Connection
        $connection = new PDO ($dsn,$username,$password,$options);
        //#2 Prepare Sql QUery 
        $statement = $connection->prepare("INSERT INTO students (firstname, lastname, email, age,address,school,date) values (?,?,?,?,?,? ,NOW())");
        $statement ->bindParam(1,$_POST['firstname'],PDO::PARAM_STR);
        $statement ->bindParam(2,$_POST['lastname'],PDO::PARAM_STR);
        $statement ->bindParam(3,$_POST['email'],PDO::PARAM_STR);
        $statement ->bindParam(4,$_POST['age'],PDO::PARAM_STR);
        $statement ->bindParam(5,$_POST['address'],PDO::PARAM_STR);
        $statement ->bindParam(6,$_POST['school'],PDO::PARAM_STR);

        //$statement = $connection->prepare($sql);
        $statement->execute();
    }   catch (PDOException $error){
            echo "<br>".$error->getMessage();
    }
}
?>

<?php include "../include/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
  <?php echo escape($_POST['lastname']); ?> successfully added.
<?php }else{
    echo 'insert error';
} ?>
    <h2> <i class="fas fa-address-card" style="color:red; font-size: 100px"></i>Register a Student </h2>

    <form  method ="post" id="form">
        <label for= "firsttname"> First Name </label>
        <input type= "text" name="firstname" id = "fisrtname" >
        <label for="lastname">Last Name </label>
        <input type="text" name="lastname" id="lastname">
        <label for="email">Email Address</label>
        <input type="text" name="email" id="email">
        <label for="age"> Age </label>
        <input type="number" min="1" name="age" id="number">
        <label for="address"> Address </label>
        <input type="text" name="address" id="address">
        <label for="school"> School Platoon </label>
        <input type="text" name="school" id="school">
        <input type="submit" name="submit" id="submit" value="Submit"> 
        <!-- <button type="button" onclick="validate_data()" class="btn btn-primary">Submit </button> -->
    </form>

    <a href=inner-main.php> Main Page </a>
    <?php include "../include/footer.php"; ?>

<!-- <script>
    function validate_data() {
        if ($('#fisrtname').val() == '') {
            alert('havent fill the first name')
        }
        else if ($('#lastname').val() == '') {
            alert('havent fill the last name')
        }
        else {
            $("#form").submit();    
        }
    }

</script> -->
</body>
</html>