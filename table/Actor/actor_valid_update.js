// Defining a function to validate form 
function validateForm() {

    var error_msg = "";

    // Retrieving the values of form elements
    var first_name = document.myform.first_name.value;
    var last_name = document.myform.last_name.value;

    // Defining error variables with a default value
    var first_nameErr = last_nameErr = true;


    // Validate first name
    if (first_name == '') {

        error_msg += ("First Name cannot be blank\n");

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

        error_msg += ("First Name cannot be blank\n");

    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(last_name) === false) {

            error_msg += ("Please enter a valid last name\n");

        } else {
            last_nameErr = false;
        }
    }

    //show out the alert messages
    // if (error_msg != '') {
    //     alert(error_msg);
    // }

    //Prevent the form from being submitted if there are any errors
    if ((first_nameErr || last_nameErr) == true) {
        alert(error_msg);
        return false;
    } else {


        // Display input data in a dialog box before submitting the form
        alert("You have successfully updated this record");
    }


}