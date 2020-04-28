<?php
if (isset($_POST['submit'])) {
        echo ("entered " . $_POST['first_name']);
}
?>

<!DOCTYPE html>
<html>

<head>
    <script>
        function validateForm() {
            // var first_name = document.idmyform.fname.value;
            var x = document.forms["myForm"]["first_name"].value;
            if (x == "") {
                alert("Name must be filled out");
                return false;
            }
        }
    </script>
</head>

<body>

    <form name="myForm" action="test.php" onsubmit="return validateForm()" method="post">
        Name: <input type="text" name="first_name" id="first_name" class="input">
        <input type="submit" name="submit" value="press without enter text">
    </form>

</body>

</html>