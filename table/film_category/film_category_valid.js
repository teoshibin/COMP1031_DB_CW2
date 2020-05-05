// Defining a function to validate form 
function validateForm() {

    var error_msg = "";

    // Retrieving the values of form elements
    var film_id = document.myform.film_id.value;
    var category_id = document.myform.category_id.value;

    // Defining error variables with a default value
    var film_idErr = category_idErr = true;


    // Validate first name
    if (film_id == 'hide') {
        error_msg += ("Please sekect film\n");
    } else {
        film_idErr = false;
    }

    // Validate last name
    if (category_id == 'hide') {
        error_msg += ("Please select category\n");
    } else {
        category_idErr = false;
    }

    //Prevent the form from being submitted if there are any errors
    if (error_msg != "") {
        alert(error_msg);
        return false;
    } else {
        // Creating a string from input data for preview
        var dataPreview = "You've entered the following details: \n" +
            "Film ID: " + film_id + "\n" +
            "Category ID: " + category_id + "\n";

        // Display input data in a dialog box before submitting the form
        alert(dataPreview);
    }


}