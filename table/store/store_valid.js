// Defining a function to validate form 
function validateForm() {


    var error_msg = "";

    // Retrieving the values of form elements
    var address_id = document.myform.address_id.value;
    var manager_staff_id = document.myform.manager_staff_id.value;


    // Defining error variables with a default value
    var address_idErr = manager_staff_idErr = true;


    if (address_id == 'hide') {

        error_msg += ("Please select an address\n");


    } else {
        address_idErr = false;

    }

    if (manager_staff_id == 'hide') {

        error_msg += ("Please select a staff\n");


    } else {
        manager_staff_idErr = false;

    }


    if ((address_idErr || manager_staff_idErr) == true) {
        alert(error_msg);
        return false;
    } else {
        var dataPreview = "You've entered the following details: \n" +
        "manager_staff_id: " + manager_staff_id + "\n" +
        "Address_id: " + address_id + "\n";

        alert(dataPreview);
    }



}