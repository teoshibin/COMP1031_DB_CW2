// Defining a function to validate form 
function validateForm() {

    var error_msg = "";

    // Retrieving the values of form elements
    var country = document.myform.country.value;
   
    // Defining error variables with a default value
    var countryErr  = true;


    // Validate Country
    if (country == '') {

        error_msg += ("Please fill in the country\n");

    } else {

        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(country) === false) {

            error_msg += ("Please enter a valid Country Name\n");

        } else {
            countryErr = false;
        }
    }



    //show out the alert messages
    // if (error_msg != '') {
    //     alert(error_msg);
    // }

    //Prevent the form from being submitted if there are any errors
    if ((countryErr) == true) {
         //show out the alert messages
        alert(error_msg);
        return false;
    } else {
        // Creating a string from input data for preview
        var dataPreview = "You've entered the following details: \n" +
            "Country: " + country + "\n" ;

        // Display input data in a dialog box before submitting the form
        alert(dataPreview);
    }


}