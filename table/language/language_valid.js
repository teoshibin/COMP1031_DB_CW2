
// Defining a function to validate form 
function validateForm() {


    var error_msg="";

    // Retrieving the values of form elements
    var name = document.myform.name.value;
 
    //Defining error variables with a default value
    var nameErr  = true;


    // Validate Rating
    if(name == '') {
        
        error_msg+=("Please enter the language name\n");
    
    } else {
        
        nameErr=false;
        
    }

    //Prevent the form from being submitted if there are any errors
    if(( nameErr ) == true) {
        //show out the alert messages
        alert(error_msg);
        return false;
    } else {
        // alert("i love you");
        // Creating a string from input data for preview
        var dataPreview = "You've entered the following details: \n" +
                          "Language: " + name + "\n";
        // Display input data in a dialog box before submitting the form
        alert(dataPreview);
    }


}