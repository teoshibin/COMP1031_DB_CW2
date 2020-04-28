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
    var active = document.form.active.value;


    // Defining error variables with a default value
    var first_nameErr = last_nameErr = emailErr = address_idErr = store_idErr =activeErr= true;


// Validate first name
if(first_name == "") {
    printError("first_nameErr", "Please enter your First Name");
    error_msg+=("Please insert your First Name\n");
    $('#first_name').addClass('errorBox');
} else {
    var regex = /^[a-zA-Z\s]+$/;                
    if(regex.test(first_name) === false) {
        printError("first_nameErr", "Please enter a valid First Name");
        error_msg+=("Please enter a valid First Name\n");
        $('#first_name').addClass('errorBox');
    } else {
        printError("first_nameErr", "");
        nameErr = false;
        $('#first_name').removeClass('errorBox');
    }
}

// Validate last name
if(last_name == "") {
    printError("last_nameErr", "Please enter your last name");
    error_msg+=("Please insert your last name\n");
    $('#last_name').addClass('errorBox');
} else {
    var regex = /^[a-zA-Z\s]+$/;                
    if(regex.test(last_name) === false) {
        printError("last_nameErr", "Please enter a valid last name");
        error_msg+=("Please enter a valid last name\n");
        $('#last_name').addClass('errorBox');
    } else {
        printError("last_nameErr", "");
        nameErr = false;
        $('#last_name').removeClass('errorBox');
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

// Validate Address ID
if(address_id == "") {
    printError("address_idErr", "Please enter your Address ID");
    error_msg+=("Please insert your Address ID\n");
    $('#address_id').addClass('errorBox');
} else {
    var regex = /^[0-9]*$/;
    if(regex.test(address_id) === false) {
        printError("address_idErr", "Please enter a valid  digit Address ID");
        error_msg+=("Please insert a valid  digit Address ID\n");
        $('#address_id').addClass('errorBox');
    } else{
        printError("address_idErr", "");
        address_idErr = false;
        $('#address_id').removeClass('errorBox');
    }
}

// Validate store ID
if(store_id == "") {
    printError("store_idErr", "Please enter your Store ID");
    error_msg+=("Please insert the Store ID\n");
    $('#store_id').addClass('errorBox');
} else {
    var regex = /^[0-9]*$/;
    if(regex.test(store_id) === false) {
        printError("store_idErr", "Please enter a valid digit Store ID");
        error_msg+=("Please insert a valid digit Store ID\n");
        $('#address_id').addClass('errorBox');
    } else{
        printError("store_idErr", "");
        address_idErr = false;
        $('#store_id').removeClass('errorBox');
    }
}

// Validate active
if((!($('.activeYes').prop('checked'))) && (!($('.activeNo').prop('checked')))){
    printError("activeErr", "Please select either Yes or No");
    error_msg+=("Please select either Yes or No\n");
   
} else {
    printError("schoolErr", "");
    schoolErr = false;
    $('#school').removeClass('errorBox');
}

//show out the alert messages
if(error_msg!=""){
    alert(error_msg);
}
// Prevent the form from being submitted if there are any errors
if((first_nameErr || last_nameErr || emailErr || address_idErr|| store_idErr || activeErr) == true) {
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