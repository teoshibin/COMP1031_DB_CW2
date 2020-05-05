    // Defining a function to validate form 
function validateForm() {

    var error_msg = "";

    // Retrieving the values of form elements
    var city = document.myform.city.value;
    var country_id = document.myform.country_id.value;

    // Defining error variables with a default value
    var cityErr = country_idErr = true;


    if (city == '') {

        error_msg += ("Please insert your city Name\n");

    } else {

        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(city) === false) {

            error_msg += ("Please enter a valid city Name\n");

        } else {
            cityErr = false;
        }
    }


    if(country_id == 'hide') {
        
        error_msg+=("Please select the country\n");
    
    } else {
        
        country_idErr=false;
        
    }

    //Prevent the form from being submitted if there are any errors
    if ((cityErr || country_idErr) == true) {
        alert(error_msg);
        return false;
    } else {
        // Creating a string from input data for preview
        var dataPreview = "You've entered the following details: \n" +
            "City Name: " + city + "\n" +
            "Country id: " + country_id + "\n";

        // Display input data in a dialog box before submitting the form
        alert(dataPreview);
        
    }


}