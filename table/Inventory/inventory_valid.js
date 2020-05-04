
// Defining a function to validate form 
function validateForm() {


    var error_msg="";

    // Retrieving the values of form elements
    var film_id = document.myform.film_id.value;
    var store_id = document.myform.store_id.value;

 
    //Defining error variables with a default value
    var film_idErr = store_idErr = true;


    // Validate Rating
    if(film_id == 'hide') {
        
        error_msg+=("Please select the Film Title\n");
    
    } else {
        
        film_idErr=false;
        
    }

    // Validate special features
    if(store_id == 'hide') {
        
        error_msg+=("Please select the Store ID\n");
    
    } else {
        
        store_idErr=false;
        
    }


    //Prevent the form from being submitted if there are any errors
    if(( film_idErr || store_idErr) == true) {
        //show out the alert messages
        alert(error_msg);
        return false;
    } else {
        // alert("i love you");
        // Creating a string from input data for preview
        var dataPreview = "You've entered the following details: \n" +
                          "Film ID: " + film_id + "\n" +
                          "Store ID: " + store_id + "\n" ;
        // Display input data in a dialog box before submitting the form
        alert(dataPreview);
    }


}