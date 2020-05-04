
// Defining a function to validate form 
function validateForm() {


    var error_msg="";

    // Retrieving the values of form elements
    var first_name = document.myform.first_name.value;
    var last_name = document.myform.last_name.value;
    var email = document.myform.email.value;
    var address_id = document.myform.address_id.value;
    var store_id = document.myform.store_id.value;
    var active = document.myform.active.value;
    
    // Retrieving the values of form elements
    // var first_name = document.forms["myform"]["first_name"].value;
    // var last_name = document.forms["myform"]["last_name"].value;
    // var email = document.forms["myform"]["email"].value;
    // var address_id = document.forms["myform"]["address_id"].value;
    // var store_id = document.forms["myform"]["store_id"].value;
    // var active = document.forms["myform"]["active"].value;



    // Defining error variables with a default value
    var first_nameErr = last_nameErr = emailErr = address_idErr = store_idErr= true;


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
    if(store_id == '-') {
        
        error_msg+=("Please select the Store ID\n");
    
    } else {
        
        store_idErr=false;
        
    }

    // // Validate active
    // if((!($('#sizeWeight').prop('checked'))) && (!($('#sizeDimension').prop('checked')))){
    
    //     error_msg+=("Please select either Yes or No\n");
        
    // } else {
    //     activeErr=false;
    // }

    //show out the alert messages
    if(error_msg!=''){
        alert(error_msg);
    }

    //Prevent the form from being submitted if there are any errors
    if((first_nameErr || last_nameErr || emailErr || address_idErr || store_idErr) == true) {
        // alert(error_msg);
        return false;
    } else {
        // alert("i love you");
        // Creating a string from input data for preview
        var dataPreview = "You've entered the following details: \n" +
                        "First Name: " + first_name + "\n" +
                        "Last Name: " + last_name + "\n" +
                        "Email Address: " + email + "\n" +
                        "Address ID: " + address_id + "\n" +
                        "Store ID: " + store_id + "\n" +
                        "Active: " + active + "\n" ;
    

        // var dataPreview = "Success";

        // Display input data in a dialog box before submitting the form
        alert(dataPreview);
    }




}