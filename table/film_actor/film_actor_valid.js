
// Defining a function to validate form 
function validateForm() {

    var error_msg="";

    // Retrieving the values of form elements
    var actor_id = document.myform.actor_id.value;
    var film_id = document.myform.film_id.value;
    
    // Defining error variables with a default value
    var actor_idErr = film_idErr =true;

    if(actor_id == 'hide') {
        
        error_msg+=("Please select actor\n");
    
    } else {

        actor_idErr=false;
 
    }

    if(film_id == 'hide') {
        
        error_msg+=("Please select film\n");

    
    } else {
        
        film_idErr=false;
        
    }

    if((actor_idErr || film_idErr) == true) {
        alert(error_msg);
        return false;
    } else {
        var dataPreview = "You've entered the following details: \n" +
                          "actor_id: " + actor_id + "\n" +
                          "film_id: " + film_id + "\n";
       
        alert(dataPreview);
    }



}