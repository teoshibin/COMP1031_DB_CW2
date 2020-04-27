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
                    <input type="radio" name="active" value="0" id="sizeWeight" checked="checked" />
                    <label for="sizeWeight">Yes</label>
                    <input type="radio" name="active" value="1" id="sizeDimensions" />
                    <label for="sizeDimensions">No</label>
                </div>

                <input class="btn btn-primary" type="Submit" name="insert" onclick="return ">

                <br>
                <a href="customer.php" class="btn-back">BACK</a>
            </form>
</div>

<script>
   // Defining a function to display error message
   function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form 
function validateForm() {

    //defining alert error message
var error_msg="";
// Retrieving the values of form elements 
    var first_name = document.form.first_name.value;
    var last_name = document.form.last_name.value;
    var email = document.form.email.value;
    var address_id = document.form.address_id.value;
    var store_id = document.form.store_id.value;


// Defining error variables with a default value
var first_nameErr = last_nameErr = emailErr = address_idErr = store_idErr = true;


// Validate first name
if(first_name == "") {
    printError("first_nameErr", "Please enter your name");
    error_msg+=("Please insert your name\n");
    $('#first_name').addClass('errorBox');
} else {
    var regex = /^[a-zA-Z\s]+$/;                
    if(regex.test(first_name) === false) {
        printError("first_nameErr", "Please enter a valid name");
        error_msg+=("Please enter a valid name\n");
        $('#first_name').addClass('errorBox');
    } else {
        printError("first_nameErr", "");
        nameErr = false;
        $('#first_name').removeClass('errorBox');
    }
}

// Validate email address
if(email == "") {
    printError("emailErr", "Please enter your email address");
    error_msg+=("Please insert your email address\n");
    $('#email').addClass('errorBox');
} else {
    // Regular expression for basic email validation
    var regex = /^\S+@\S+\.\S+$/;
    if(regex.test(email) === false) {
        printError("emailErr", "Please enter a valid email address");
        error_msg+=("Invalid email address, Please fill in the correct email\n");
        $('#email').addClass('errorBox');
    } else{
        printError("emailErr", "");
        emailErr = false;
        $('#email').removeClass('errorBox');
    }
}

// Validate IC Number
if(ic_num == "") {
    printError("ic_numErr", "Please enter your IC Number");
    error_msg+=("Please insert your IC Number (without dash)\n");
    $('#ic_num').addClass('errorBox');
} else {
    var regex = /^[0-9]\d{11}$/;
    if(regex.test(ic_num) === false) {
        printError("ic_numErr", "Please enter a valid 12 digit IC Number (without dash)");
        error_msg+=("Please insert your 12 digit IC Number (without dash)\n");
        $('#ic_num').addClass('errorBox');
    } else{
        printError("ic_numErr", "");
        ic_numErr = false;
        $('#ic_num').removeClass('errorBox');
    }
}

// Validate school
if(school == "-") {
    printError("schoolErr", "Please select your School");
    error_msg+=("Please select your school\n");
    $('#school').addClass('errorBox');
} else {
    printError("schoolErr", "");
    schoolErr = false;
    $('#school').removeClass('errorBox');
}

// Validate bank
if(bank == "-") {
    printError("bankErr", "Please select your Bank");
    error_msg+=("Please select your bank\n");
    $('#bank').addClass('errorBox');
} else {
    printError("bankErr", "");
    bankErr = false;
    $('#bank').removeClass("removeBox");
}

// Validate Bank Account Number
if(account_num == "") {
    printError("account_numErr", "Please enter your Bank Account Number");
    error_msg+=("Please fill in your Bank account number\n");
    $('#account_num').addClass('errorBox');
} else {
    //maximum length is 21
    var regex =/^[0-9]+$/;
    if(regex.test(account_num) === false) {
        printError("account_numErr", "Please enter a valid  digit only account number");
        error_msg+=("Invalid Account Number - should be numbers only (no dash)\n");
        $('#account_num').addClass('errorBox');
    } else{
        printError("account_numErr", "");
        account_numErr = false;
        $('#account_num').removeClass('errorBox');
    }
}

// Validate Bank Account name
if(account_name == "") {
    printError("account_nameErr", "Please enter your Bank Account name");
    error_msg+=("Please fill in the provided Bank Account Holder Name\n");
    $('#account_name').addClass('errorBox');
} else {
    var regex = /^[a-zA-Z\s]+$/;                
    if(regex.test(account_name) === false) {
        printError("account_nameErr", "Please enter a valid Bank Account name");
        error_msg+=("Please fill in a valid  Bank Account Holder Name\n");
        $('#account_name').addClass('errorBox');
    } else {
        printError("account_nameErr", "");
        account_nameErr = false;
        $('#account_name').removeClass('errorBox');
    }
}

// Validate Relationship
if(relationship == "-") {
    printError("relationshipErr", "Please select the provided Account Holder relationship");
    error_msg+=("Please select the provided Account Holder relationship\n");
    $('#relationship').addClass('errorBox');
} else {
    printError("relationshipErr", "");
    relationshipErr = false;
    $('#relationship').removeClass('errorBox');
}
// Validate NTS Refund
if(nts == "-") {
    printError("ntsErr", "Please select your NTS refund amount");
    error_msg+=("Please select your NTS refund amount\n");
    $('#nts').addClass('errorBox');
} else {
    printError("ntsErr", "");
    ntsErr = false;
    $('#nts').removeClass('errorBox');
}

// Validate Pesta Refund
if(pesta == "-") {
    printError("pestaErr", "Please select your PESTA refund amount");
    error_msg+=("Please select your PESTA refund amount\n");
    $('#pesta').addClass('errorBox');
} else {
    printError("pestaErr", "");
    pestaErr = false;
    $('#pesta').removeClass('errorBox');
}
//show out the alert messages
if(error_msg!=""){
    alert(error_msg);
}
// Prevent the form from being submitted if there are any errors
if((school_numErr || nameErr || emailErr || ic_numErr || schoolErr|| bankErr || account_numErr || account_nameErr || relationshipErr || ntsErr ||  pestaErr) == true) {
    return false;
} 
else {
     // Creating a string from input data for preview
     var dataPreview = "You've entered the following details: \n" +
                       "School Number: " + school_num + "\n" +
                       "Full Name: " + name + "\n" +
                       "Email Address: " + email + "\n" +
                       "IC Number: " + ic_num + "\n" +
                       "School: " + school + "\n" +
                       "Bank: " + bank + "\n" +
                       "Bank Account Number: " + account_num + "\n" +
                       "Bank Account Name: " + account_name + "\n" +
                       "Bank Account Relationship: " + relationship + "\n" +
                       "NTS Refund Amount:RM " + nts + "\n" +
                       "PESTA Refund Amount:RM " + pesta + "\n" +
                       "Total Refund Amount:RM " + refund + "\n" +
                       "Remarks: " + remarks + "\n";

     // Display input data in a dialog box before submitting the form
     alert(dataPreview);
}


};
</script>

</body>
</html>