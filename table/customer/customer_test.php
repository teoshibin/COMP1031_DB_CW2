

<html>
<head>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="../../css/insert.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/releases/qpy2aGtSgsYPZzCoYWjcaBCo/recaptcha__en_gb.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <!-- <script defer type="text/javascript" src="../../js/main.js"></script> -->
    <script type="text/javascript" src="insert.js"></script>
</head>
    <!-- <h2> <i class="fas fa-address-card" style="color:red; font-size: 70px"></i>Register a Student </h2> -->
    <div class="content">
            <h3 class="title">New Customer</h3>
            <!-- onsubmit="return validateForm() -->
            <form method="post" id="form" action="insert.php" >
                
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
                    <input class="activeYes" type="radio" name="active" value="1" id="sizeWeight" checked="checked" />
                    <label for="sizeWeight">Yes</label>
                    <input class="activeNo" type="radio" name="active" value="0" id="sizeDimension" />
                    <label for="sizeDimensions">No</label>
                </div>


                <input class="btn btn-primary" type="Submit" value="submit" name="submit" onclick="return validateForm()">

                <br>
                <a href="customer.php" class="btn-back">BACK</a>
            </form>
</div>
</body>
<script>
//    // Defining a function to display error message
//    function printError(elemId, hintMsg) {
//     document.getElementById(elemId).innerHTML = hintMsg;
// }

// Defining a function to validate form 
function validateForm() {

    //defining alert error message
    // var valid = true;
    var error_msg="";
// Retrieving the values of form elements 
    var first_name = document.form.first_name.value;
    var last_name = document.form.last_name.value;
    var email = document.form.email.value;
    var address_id = document.form.address_id.value;
    var store_id = document.form.store_id.value;
    var active = document.form.active.value;


    // Defining error variables with a default value
    var first_nameErr = last_nameErr = emailErr = address_idErr = store_idErr =activeErr= true;


// Validate first name
if(first_name == '') {
    
    error_msg+=("Please insert your First Name\n");
   
   
} else {
    var regex = /^[a-zA-Z\s]+$/;                
    if(regex.test(first_name) === false) {
        error_msg+=("Please enter a valid First Name\n");
        
    } else {
        first_nameErr=false;
    }
}

// Validate last name
if(last_name == '') {
    
    error_msg+=("Please insert your last name\n");

   
} else {
    var regex = /^[a-zA-Z\s]+$/;                
    if(regex.test(last_name) === false) {
        
        error_msg+=("Please enter a valid last name\n");
 
    } else {
        last_nameErr=false;
    }
}

// Validate email address
if(email == '') {
    
    error_msg+=("Please insert your email address\n");
 
} else {
    // Regular expression for basic email validation
    var regex = /^\S+@\S+\.\S+$/;
    if(regex.test(email) === false) {
       
        error_msg+=("Invalid email address, Please fill in the correct email\n");

    } else{
        emailErr=false;
    }
}

// Validate Address ID
if(address_id == '') {
    
    error_msg+=("Please insert your Address ID\n");

} else {
    var regex = /^[0-9]*$/;
    if(regex.test(address_id) === false) {
        
        error_msg+=("Please insert a valid  digit Address ID\n");

    } else{
        address_idErr=false;
       
    }
}

// Validate store ID
if(store_id == '') {
    
    error_msg+=("Please insert the Store ID\n");
 
} else {
    var regex = /^[0-9]*$/;
    if(regex.test(store_id) === false) {
        
        error_msg+=("Please insert a valid digit Store ID\n");
    
    } else{
       
        store_idErr=false;
    }
}

// Validate active
if((!($('#sizeWeight').prop('checked'))) && (!($('#sizeDimension').prop('checked')))){
  
    error_msg+=("Please select either Yes or No\n");
    
} else {
    activeErr=false;
}

//show out the alert messages
if(error_msg!=''){
    alert(error_msg);
}
//Prevent the form from being submitted if there are any errors
if((first_nameErr || last_nameErr || emailErr || address_idErr || store_idErr|| activeErr) == true) {
        return false;
} 

else {
     // Creating a string from input data for preview
     var dataPreview = "You've entered the following details: \n" +
                       "First Name: " + first_name + "\n" +
                       "Last Name: " + last_name + "\n" +
                       "Email Address: " + email + "\n" +
                       "Address ID: " + address_id + "\n" +
                       "Store ID: " + store_id + "\n" +
                       "Active: " + active + "\n" ;

     // Display input data in a dialog box before submitting the form
     alert(dataPreview);
}


};
</script>
</html>