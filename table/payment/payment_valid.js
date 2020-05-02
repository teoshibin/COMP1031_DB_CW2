
// Defining a function to validate form 
function validateForm() {


    var error_msg="";

    // Retrieving the values of form elements
    var customer_id = document.myform.customer_id.value;
    var staff_id = document.myform.staff_id.value;
    var rental_id = document.myform.rental_id.value;
    var amount = document.myform.amount.value;

  
    
    //Defining error variables with a default value
    var customer_idErr = staff_idErr = rental_idErr = amountErr =  true;

    // Validate customer ID
    if(customer_id == '-') {
        
        error_msg+=("Please select the customer ID\n");
    
    } else {
        
        customer_idErr=false;
        
    }

    // Validate staff ID
    if(staff_id == '-') {
        
        error_msg+=("Please select the staff ID\n");
    
    } else {
        
        staff_idErr=false;
        
    }

    // Validate rental ID
    if(rental_id == '-') {
        
        error_msg+=("Please select the rental ID\n");
    
    } else {
        
        rental_idErr=false;
        
    }


    // Validate rental duration
    if(amount == '') {
        
        error_msg+=("Please insert the payment amount\n");

    } else {
        var regex = /^[0-9]+(?:\.[0-9]+)?$/;
        if(regex.test(amount) === false) {
            
            error_msg+=("Only digit is allowed in payment amount\n");

        } else{
            amountErr=false;
        
        }
    }



    //Prevent the form from being submitted if there are any errors
    if(( customer_idErr || staff_idErr || rental_idErr || amountErr ) == true) {
        //show out the alert messages
        alert(error_msg);
        return false;
    } else {
        // alert("i love you");
        // Creating a string from input data for preview
        var dataPreview = "You've entered the following details: \n" +
                          "Customer ID: " + customer_id + "\n" +
                          "Staff ID: " + staff_id + "\n" +
                          "Rental ID: " + rental_id + "\n" +
                          "Amount: $" + amount + "\n" ;
       

        // var dataPreview = "Success";

        // Display input data in a dialog box before submitting the form
        alert(dataPreview);
    }


}