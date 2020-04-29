// Defining a function to validate form 
function validateForm() {

    var error_msg = "";

    // Retrieving the values of form elements
    var name = document.myform.name.value;

    // Defining error variables with a default value
    var nameErr = true;


    // Validate first name
    if (name == '') {

        error_msg += ("Please insert your category Name\n");

    } else {

        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(name) === false) {

            error_msg += ("Please enter a valid category Name\n");

        } else {
            nameErr = false;
        }
    }

    //Prevent the form from being submitted if there are any errors
    if ( nameErr == true ) {
        alert(error_msg);
        return false;
    } else {
        // Creating a string from input data for preview
        var dataPreview = "You've entered the following details: \n" +
            "category Name: " + name + "\n";

        // Display input data in a dialog box before submitting the form
        alert(dataPreview);
    }


}