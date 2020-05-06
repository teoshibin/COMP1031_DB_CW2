// Defining a function to validate form 
function validateForm() {


    var error_msg = "";

    // Retrieving the values of form elements
    var title = document.myform.title.value;
    var description = document.myform.description.value;
    var release_year = document.myform.release_year.value;
    var language_id = document.myform.language_id.value;
    var original_language_id = document.myform.original_language_id.value;
    var rental_duration = document.myform.rental_duration.value;
    var rental_rate = document.myform.rental_rate.value;
    var length = document.myform.length.value;
    var replacement_cost = document.myform.replacement_cost.value;
    var rating = document.myform.rating.value;
    var special_features = document.myform.special_features.value;

    //CAN BE NULL : description release_year original_language_id length rating special


    //Defining error variables with a default value
    var titleErr = descriptionErr = release_yearErr = language_idErr = rental_durationErr = rental_rateErr = lengthErr = replacement_costErr = ratingErr = special_featuresErr = true;


    // Validate Title
    if (title == '') {

        error_msg += ("Please insert the Film Title\n");


    } else {
        var regex = /^[a-zA-Z0-9\s]+$/;
        if (regex.test(title) === false) {
            error_msg += ("Please enter a valid Film Title\n");

        } else {
            titleErr = false;
        }
    }

    // Validate description
    var regex = /^[a-zA-Z\s]*$/;
    if (regex.test(description) === false) {

        error_msg += ("Please enter a valid description about this film\n");

    } else {
        descriptionErr = false;
    }

    // Validate release year
    if (release_year != '') {
        var regex = /^[0-9]\d{3}$/;
        if (regex.test(release_year) === false) {

            error_msg += ("Please insert the release year in this format- YYYY\n");

        } else {
            release_yearErr = false;
        }
    }

    // Validate language ID
    if (language_id == 'hide') {

        error_msg += ("Please select the Language\n");

    } else {

        language_idErr = false;

    }

    // Validate original language ID
    if (original_language_id == 'hide') {

        $('select[name$="original_language_id"]').val('');
    }

    // Validate rental duration
    if (rental_duration == '') {

        error_msg += ("Please insert the film's rental duration\n");

    } else {
        var regex = /^[0-9]*$/;
        if (regex.test(rental_duration) === false) {

            error_msg += ("Only digit is allowed in film rental duration\n");

        } else {
            rental_durationErr = false;

        }
    }

    // Validate rental duration
    if (rental_rate == '') {

        error_msg += ("Please insert the film's rental rate\n");

    } else {
        var regex = /^[0-9]+(?:\.[0-9]+)?$/;
        if (regex.test(rental_rate) === false) {

            error_msg += ("Only decimal is allowed in film rental rate\n");

        } else {
            rental_rateErr = false;

        }
    }

    // Validate length
    if (length != '') {
        var regex = /^[0-9]*$/;
        if (regex.test(length) === false) {

            error_msg += ("Only digit is allowed in film length\n");

        } else {
            lengthErr = false;

        }
    }

    // Validate replacement cost
    if (replacement_cost == '') {

        error_msg += ("Please insert the film's replacement cost\n");

    } else {
        var regex = /^[0-9]+(?:\.[0-9]+)?$/;
        if (regex.test(replacement_cost) === false) {

            error_msg += ("Only decimal is allowed in film replacement cost\n");

        } else {
            replacement_costErr = false;

        }
    }

    // Validate Rating
    if (rating == 'hide') {

        error_msg += ("Please select the rating\n");

    } else {

        ratingErr = false;

    }

    // Validate special features
    // if (special_features == '-') {

    //     error_msg += ("Please select the special features\n");

    // } else {

    //     special_featuresErr = false;

    // }


    //Prevent the form from being submitted if there are any errors
    if (error_msg != ''){
        //show out the alert messages
        alert(error_msg);
        return false;
    } else {
        // alert("i love you");
        // Creating a string from input data for preview
        var dataPreview = "You've entered the following details: \n" +
            "Title: " + title + "\n" +
            "Description: " + description + "\n" +
            "Release Year: " + release_year + "\n" +
            "Language ID: " + language_id + "\n" +
            "Original Language ID: " + original_language_id + "\n" +
            "Rental Duration: " + rental_duration + "\n" +
            "Rental Rate: $" + rental_rate + "\n" +
            "Length: " + length + "\n" +
            "Replacement Cost: $" + replacement_cost + "\n" +
            "Rating: $" + rating + "\n" +
            "Special Features: " + special_features + "\n";


        // var dataPreview = "Success";

        // Display input data in a dialog box before submitting the form
        alert(dataPreview);
    }


}