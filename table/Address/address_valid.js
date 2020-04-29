
// Defining a function to validate form 
function validateForm() {


    var error_msg="";

    // Retrieving the values of form elements
    var address = document.myform.address.value;
    var address2 = document.myform.address2.value;
    var district = document.myform.district.value;
    var city_id = document.myform.city_id.value;
    var postal_code = document.myform.postal_code.value;
    var phone = document.myform.phone.value;
    

    // Defining error variables with a default value
    var addressErr  = districtErr = city_idErr = postal_codeErr = phoneErr=true;


    // Validate Address
    if(address == '') {
        
        error_msg+=("Please insert your Address\n");
    
    
    } else {
        addressErr=false;
 
    }

    // Validate District
    if(district == '') {
        
        error_msg+=("Please insert your District\n");

    
    } else {
        
        districtErr=false;
        
    }

    // Validate City
    if(city_id == 'Please select your city') {
        
        error_msg+=("Please select your city\n");
    
    } else {
        
        city_idErr=false;
  
    }

    // Validate Postal Code
    var regex = /^[0-9]*$/;
    if(regex.test(postal_code) === false) {
        
        error_msg+=("Please insert a valid Postal Code (Numbers only)\n");
    } else{
        postal_codeErr=false;
    
    }

    // Validate Phone
    var regex = /^[0-9]*$/;
    if(regex.test(phone) === false) {
        
        error_msg+=("Please insert a valid Phone Numbers (Numbers only)\n");
    } else{
        phoneErr=false;
    
    }


    //Prevent the form from being submitted if there are any errors
    if((addressErr || districtErr || city_idErr || postal_codeErr || phoneErr) == true) {
        //show out the alert messages
        alert(error_msg);
        return false;
    } else {
        // alert("i love you");
        // Creating a string from input data for preview
        var dataPreview = "You've entered the following details: \n" +
                          "Address: " + address + "\n" +
                          "Address2: " + address2 + "\n" +
                          "District: " + district + "\n" +
                          "City: " + city_id + "\n" +
                          "Postal Code: " + postal_code + "\n" +
                          "Phone Number: " + phone + "\n" ;
       

        // var dataPreview = "Success";

        // Display input data in a dialog box before submitting the form
        alert(dataPreview);
    }



}