// Defining a function to validate form 
function validateForm() {


    var error_msg = "";

    // Retrieving the values of form elements
    var first_name = document.myform.first_name.value;
    var last_name = document.myform.last_name.value;
    var email = document.myform.email.value;
    var address_id = document.myform.address_id.value;
    var store_id = document.myform.store_id.value;
    var active = document.myform.active.value;
    var username = document.myform.username.value;
    var password = document.myform.password.value;

    // Defining error variables with a default value
    var first_nameErr = last_nameErr = emailErr = address_idErr = store_idErr = usernameErr = passwordErr = true;

    // Validate first name
    if (first_name == '') {

        error_msg += ("Please insert your First Name\n");


    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(first_name) === false) {
            error_msg += ("Please enter a valid First Name\n");

        } else {
            first_nameErr = false;
        }
    }

    // Validate last name
    if (last_name == '') {

        error_msg += ("Please insert your last name\n");


    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(last_name) === false) {

            error_msg += ("Please enter a valid last name\n");

        } else {
            last_nameErr = false;
        }
    }

    // Validate email address
    if (email == '') {

        error_msg += ("Please insert your email address\n");

    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if (regex.test(email) === false) {

            error_msg += ("Invalid email address, Please fill in the correct email\n");

        } else {
            emailErr = false;
        }
    }

    // Validate Address ID
    if (address_id == '') {

        error_msg += ("Please insert your Address ID\n");

    } else {
        var regex = /^[0-9]*$/;
        if (regex.test(address_id) === false) {

            error_msg += ("Please select a valid Address ID\n");

        } else {
            address_idErr = false;

        }
    }

    // Validate store ID
    if (store_id == '-') {

        error_msg += ("Please select the Store ID\n");

    } else {

        store_idErr = false;

    }

    //validate username
    if (username == '') {
        error_msg += ("Please insert username\n");
    } else {
        var regex = /^[a-zA-Z0-9\S]+$/
        if (regex.test(username) === false) {
            error_msg += "Please insert valid username\n";
        } else {
            usernameErr = false;
        }
    }

    //validate password
    if (password == '') {
        error_msg += ("Please insert password\n");
    } else {
        var regex = /^[.\S]{6,}$/
        if (regex.test(password) === false) {
            error_msg += "Please insert password that is atleast 6 characters long\n";
        } else {
            passwordErr = false;
        }
    }

    //show out the alert messages
    if (error_msg != '') {
        alert(error_msg);
        return false;
    } else {

        var dataPreview = "You've entered the following details: \n" +
            "First Name: " + first_name + "\n" +
            "Last Name: " + last_name + "\n" +
            "Email Address: " + email + "\n" +
            "Address ID: " + address_id + "\n" +
            "Store ID: " + store_id + "\n" +
            "Active: " + active + "\n";
            // "username: " + username +
            // "password: " + password;


        // var dataPreview = "Success";

        // Display input data in a dialog box before submitting the form
        alert(dataPreview);
    }

    return true;


}

function fileValidation() {
    var fileInput = document.getElementById('my-file');

    var filePath = fileInput.value;

    // Allowing file type 
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

    if (!allowedExtensions.exec(filePath)) {
        alert('Invalid file type');
        fileInput.value = '';
        return false;
    } else {
        return true;
        //     // Image preview 
        //     if (fileInput.files && fileInput.files[0]) { 
        //         var reader = new FileReader(); 
        //         reader.onload = function(e) { 
        //             document.getElementById( 
        //                 'imagePreview').innerHTML =  
        //                 '<img src="' + e.target.result 
        //                 + '"/>'; 
        //         }; 

        //         reader.readAsDataURL(fileInput.files[0]); 
        //     } 
    }
}