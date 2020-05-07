<?php
require "../../include/config.php";
require "../../include/common.php";
require_once "../../include/login-check.php";
require_once "../../include/header.php";

$statement = false;

try {

    //#1 Open Connection
    $connection = new PDO($dsn, $username, $password, $options);

    //#2 Prepare Sql QUery 
    $statement1 = $connection->prepare("SELECT customer_id,first_name,last_name FROM customer");
    $statement1->execute();
    $result1 = $statement1->fetchAll();

    $statement2 = $connection->prepare("SELECT staff_id,first_name,last_name FROM staff");
    $statement2->execute();
    $result2 = $statement2->fetchAll();

    // $statement3 = $connection->prepare("SELECT rental_id FROM rental");
    // $statement3->execute();
    // $result3 = $statement3->fetchAll();

} catch (PDOException $error) {

    echo "<br>" . $error->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="../../css/insert.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet"> -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> -->
    <!-- <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/releases/qpy2aGtSgsYPZzCoYWjcaBCo/recaptcha__en_gb.js"></script> -->
    <!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->
    <!-- <script src="https://kit.fontawesome.com/a81368914c.js"></script> -->
    <!-- <script defer type="text/javascript" src="../../js/main.js"></script> -->
    <script type="text/javascript" src="payment_valid.js"></script>
    <!-- <script>
        function genOption(callback) {
            console.log('inline');
            var url = "rental_id_json.php";
            $.getJSON(url, function(data, callback) {
                console.log('is appending');
                $.each(data, function(index, value, callback) {
                    $('#rental_id_add').append('<option value="' + value.rental_id + '">' + value.rental_id + '</option>');
                });
                console.log('is appended');
                callback();
            });
        }

        function replaceDropdown() {
            console.log('replacing dropdown');
            $('select').each(function() { //.each(function(index)){} iterate each of ul item

                // console.log('main');

                var $this = $(this),
                    numberOfOptions = $(this).children('option').length; //$this = $('select') tag

                $this.addClass('select-hidden');
                $this.wrap('<div class="select"></div>');
                $this.after('<div class="select-styled"></div>');

                var $styledSelect = $this.next('div.select-styled'); //select tag . next div that contains class select-style
                // $styledSelect.text($this.children('option').eq(0).text()); // this display the default text of dropdown or selected
                //     // dropdown.text = select.option.index(0).text

                for (var k = 0; k < numberOfOptions; k++) {
                    if ($this.val() == $this.children('option').eq(k).val()) {
                        $styledSelect.text($this.children('option').eq(k).text())
                    }
                }

                var $list = $('<ul />', {
                    'class': 'select-options'
                }).insertAfter($styledSelect);

                for (var i = 0; i < numberOfOptions; i++) {
                    $('<li />', {
                        text: $this.children('option').eq(i).text(),
                        rel: $this.children('option').eq(i).val()
                    }).appendTo($list);
                }

                //event respond
                var $listItems = $list.children('li');

                $styledSelect.click(function(e) { // when dropdown was clicked toggle class active 
                    e.stopPropagation(); //prevent clicking multiple times
                    $('div.select-styled.active').not(this).each(function() {
                        $(this).removeClass('active').next('ul.select-options').hide();
                    });
                    $(this).toggleClass('active').next('ul.select-options').toggle();
                });

                $listItems.click(function(e) { // when clicked on li
                    e.stopPropagation();
                    $styledSelect.text($(this).text()).removeClass('active');
                    $this.val($(this).attr('rel')); // select.name.value = listitems.relation
                    $list.hide();
                    //console.log($this.val());
                });

                $(document).click(function() { // when window outside the dropdown was clicked
                    $styledSelect.removeClass('active');
                    $list.hide(); // hide items
                });

            });
        }
    </script> -->
</head>

<div class="content">
    <h3 class="title">New Payment</h3>

    <form name="myform" action="payment_add.inc.php" onsubmit="return validateForm()" method="post">

        <select type="text" name="customer_id" id="customer_id" class="input">
            <option value="hide" selected>Customer ID</option>
            <?php foreach ($result1 as $customer) {
                echo "<option value =$customer[customer_id]>$customer[customer_id]. $customer[first_name] $customer[last_name]</option>";
            } ?>
        </select>
        <br>
        <select type="text" name="staff_id" id="staff_id" class="input">
            <option value="hide" selected>Staff ID</option>
            <?php foreach ($result2 as $staff) {
                echo "<option value =$staff[staff_id]>$staff[staff_id]. $staff[first_name] $staff[last_name]</option>";
            } ?>
        </select>
        

        <br>
        <!-- <select name="rental_id" id="rental_id_add" class="input">
            <option value="hide">Rental ID</option>
        </select> -->
        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Rental</h5>
                <input type="text" name="rental_id" id="rental_id" class="input">
            </div>
        </div>



        <br>

        <!-- <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Rental ID</h5>
                <input type="number" name="rental_id" id="rental" class="input">
            </div>
        </div> -->

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Amount</h5>
                <input type="number" name="amount" id="amount" step="0.01" class="input">
            </div>
        </div>


        <input class="btn btn-primary" type="submit" name="submit" style="margin-top:30px">

        <br>

        <a href="payment.php" class="btn-back" style="margin-bottom:100px;">BACK</a>

    </form>
</div>
</body>

<script>
    // $(document).ready(function(){

    //     $('#rental_id').empty();
    //     $('#rental_id').append("<option>Rental ID</option>");

    //     $.ajax({
    //             type: "GET",
    //             url: "rental_id_json.php",
    //             contentType: "application/json; charset=utf-8",
    //             dataType:"json",
    //             success: function(data){
    //                 $('#rental_id').empty();
    //                 $('#rental_id').append("<option value='hide'>Rental ID</option>");
    //                 $.each(data, function(index, value) {
    //                     $('#rental_id').append('<option value="' +value.rental_id + '">' + value.rental_id + '</option>');
    //                 });
    //             },
    //             complete:function(){

    //             }
    //         });

    // });

    // $(document).ready(function(){
    //     var url = "rental_id_json.php";
    //     $.getJSON(url, function (data) {
    //         $.each(data, function (index, value) {
    //             // APPEND OR INSERT DATA TO SELECT ELEMENT.
    //             // console.log(value.rental_id);
    //             $('#rental_id').append('<option value="' + value.rental_id  + '">' + value.rental_id + '</option>');

    //             // $('#rental_id').append($('<option>',{ value: rental_id, text: rental_id }));

    //             // var option = $('<option value="'+value.rental_id+'">'+value.rental_id +'</option>');
    //             // $('#rental_id').append(option);

    //             // console.log('#rental_id');

    //             // $('#rental_id').append($('<option>', { 
    //             //     value: value.value,
    //             //     text : value.rental_id
    //             // }));

    //             // $('#rental_id').append('<option value="${value.rental_id}"> ${value.rental_id} </option>');

    //         });
    //     });
    // });

    // $(document).ready(function(){
    //     var url = "rental_id_json.php";
    //     $.getJSON(url, function (data) {
    //         $.each(data, function (index, value) {
    //             // APPEND OR INSERT DATA TO SELECT ELEMENT.
    //             // console.log(value.rental_id);
    //             $('#rental_id_add').append('<option value="' + value.rental_id  + '">' + value.rental_id + '</option>');
    //             // $('select[name="rental_id"][id="rental_id"]').appendappend('<option value="' + value.rental_id  + '">' + value.rental_id + '</option>');

    //         });
    //     });
    // });

    // function genOption() {
    //     var url = "rental_id_json.php";
    //     $.getJSON(url, function(data) {
    //         $.each(data, function(index, value) {
    //             $('#rental_id_add').append('<option value="' + value.rental_id + '">' + value.rental_id + '</option>');
    //         });
    //     });
    // }
</script>

</html>