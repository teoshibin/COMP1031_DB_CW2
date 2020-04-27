   // Defining a function to display error message
   function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form 
function validateForm() {

    //defining alert error message
var error_msg="";
// Retrieving the values of form elements 
    var school_num = document.form.school_num.value;
    var name = document.form.name.value;
    var email = document.form.email.value;
    var ic_num = document.form.ic_num.value;
    var school = document.form.school.value;
    var bank = document.form.bank.value;
    var account_num = document.form.account_num.value;
    var account_name = document.form.account_name.value;
    var relationship = document.form.relationship.value;
    var nts = document.form.nts.value;
    var pesta = document.form.pesta.value;
    var refund = document.form.refund.value;
    var remarks = document.form.remarks.value;

// Defining error variables with a default value
var school_numErr = nameErr = emailErr = ic_numErr = schoolErr = bankErr = account_numErr = account_nameErr = relationshipErr = ntsErr =  pestaErr = true;

// Validate name
if(school_num == "") {
    printError("school_numErr", "Please enter your School Number");
    error_msg+=("Please insert your school number\n");
    $('#school_num').addClass('errorBox');
}else {
    printError("school_numErr", "");
    school_numErr = false;
    $('#school_num').removeClass('errorBox');
}

// Validate name
if(name == "") {
    printError("nameErr", "Please enter your name");
    error_msg+=("Please insert your name\n");
    $('#name').addClass('errorBox');
} else {
    var regex = /^[a-zA-Z\s]+$/;                
    if(regex.test(name) === false) {
        printError("nameErr", "Please enter a valid name");
        error_msg+=("Please enter a valid name\n");
        $('#name').addClass('errorBox');
    } else {
        printError("nameErr", "");
        nameErr = false;
        $('#name').removeClass('errorBox');
    }
}

// Validate email address
if(email == "") {
    printError("emailErr", "Please enter your email address");
    error_msg+=("Please insert your email address\n");
    $('#email').addClass('errorBox');
} else {
    // Regular expression for basic email validation
    var regex = /^\S+@\S+\.\S+$/;
    if(regex.test(email) === false) {
        printError("emailErr", "Please enter a valid email address");
        error_msg+=("Invalid email address, Please fill in the correct email\n");
        $('#email').addClass('errorBox');
    } else{
        printError("emailErr", "");
        emailErr = false;
        $('#email').removeClass('errorBox');
    }
}

// Validate IC Number
if(ic_num == "") {
    printError("ic_numErr", "Please enter your IC Number");
    error_msg+=("Please insert your IC Number (without dash)\n");
    $('#ic_num').addClass('errorBox');
} else {
    var regex = /^[0-9]\d{11}$/;
    if(regex.test(ic_num) === false) {
        printError("ic_numErr", "Please enter a valid 12 digit IC Number (without dash)");
        error_msg+=("Please insert your 12 digit IC Number (without dash)\n");
        $('#ic_num').addClass('errorBox');
    } else{
        printError("ic_numErr", "");
        ic_numErr = false;
        $('#ic_num').removeClass('errorBox');
    }
}

// Validate school
if(school == "-") {
    printError("schoolErr", "Please select your School");
    error_msg+=("Please select your school\n");
    $('#school').addClass('errorBox');
} else {
    printError("schoolErr", "");
    schoolErr = false;
    $('#school').removeClass('errorBox');
}

// Validate bank
if(bank == "-") {
    printError("bankErr", "Please select your Bank");
    error_msg+=("Please select your bank\n");
    $('#bank').addClass('errorBox');
} else {
    printError("bankErr", "");
    bankErr = false;
    $('#bank').removeClass("removeBox");
}

// Validate Bank Account Number
if(account_num == "") {
    printError("account_numErr", "Please enter your Bank Account Number");
    error_msg+=("Please fill in your Bank account number\n");
    $('#account_num').addClass('errorBox');
} else {
    //maximum length is 21
    var regex =/^[0-9]+$/;
    if(regex.test(account_num) === false) {
        printError("account_numErr", "Please enter a valid  digit only account number");
        error_msg+=("Invalid Account Number - should be numbers only (no dash)\n");
        $('#account_num').addClass('errorBox');
    } else{
        printError("account_numErr", "");
        account_numErr = false;
        $('#account_num').removeClass('errorBox');
    }
}

// Validate Bank Account name
if(account_name == "") {
    printError("account_nameErr", "Please enter your Bank Account name");
    error_msg+=("Please fill in the provided Bank Account Holder Name\n");
    $('#account_name').addClass('errorBox');
} else {
    var regex = /^[a-zA-Z\s]+$/;                
    if(regex.test(account_name) === false) {
        printError("account_nameErr", "Please enter a valid Bank Account name");
        error_msg+=("Please fill in a valid  Bank Account Holder Name\n");
        $('#account_name').addClass('errorBox');
    } else {
        printError("account_nameErr", "");
        account_nameErr = false;
        $('#account_name').removeClass('errorBox');
    }
}

// Validate Relationship
if(relationship == "-") {
    printError("relationshipErr", "Please select the provided Account Holder relationship");
    error_msg+=("Please select the provided Account Holder relationship\n");
    $('#relationship').addClass('errorBox');
} else {
    printError("relationshipErr", "");
    relationshipErr = false;
    $('#relationship').removeClass('errorBox');
}
// Validate NTS Refund
if(nts == "-") {
    printError("ntsErr", "Please select your NTS refund amount");
    error_msg+=("Please select your NTS refund amount\n");
    $('#nts').addClass('errorBox');
} else {
    printError("ntsErr", "");
    ntsErr = false;
    $('#nts').removeClass('errorBox');
}

// Validate Pesta Refund
if(pesta == "-") {
    printError("pestaErr", "Please select your PESTA refund amount");
    error_msg+=("Please select your PESTA refund amount\n");
    $('#pesta').addClass('errorBox');
} else {
    printError("pestaErr", "");
    pestaErr = false;
    $('#pesta').removeClass('errorBox');
}
//show out the alert messages
if(error_msg!=""){
    alert(error_msg);
}
// Prevent the form from being submitted if there are any errors
if((school_numErr || nameErr || emailErr || ic_numErr || schoolErr|| bankErr || account_numErr || account_nameErr || relationshipErr || ntsErr ||  pestaErr) == true) {
    return false;
} 
else {
     // Creating a string from input data for preview
     var dataPreview = "You've entered the following details: \n" +
                       "School Number: " + school_num + "\n" +
                       "Full Name: " + name + "\n" +
                       "Email Address: " + email + "\n" +
                       "IC Number: " + ic_num + "\n" +
                       "School: " + school + "\n" +
                       "Bank: " + bank + "\n" +
                       "Bank Account Number: " + account_num + "\n" +
                       "Bank Account Name: " + account_name + "\n" +
                       "Bank Account Relationship: " + relationship + "\n" +
                       "NTS Refund Amount:RM " + nts + "\n" +
                       "PESTA Refund Amount:RM " + pesta + "\n" +
                       "Total Refund Amount:RM " + refund + "\n" +
                       "Remarks: " + remarks + "\n";

     // Display input data in a dialog box before submitting the form
     alert(dataPreview);
}


};