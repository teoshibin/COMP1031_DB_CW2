// function genOption(callback) {
//     console.log('inline');
//     var url = "rental_id_json.php";
//     $.getJSON(url, function(data, callback) {
//         console.log('is appending');
//         $.each(data, function(index, value, callback) {
//             $('#rental_id_add').append('<option value="' + value.rental_id + '">' + value.rental_id + '</option>');
//         });
//         console.log('is appended');
//         callback();
//     });
// }

// function replaceDropdown() {
//     console.log('replacing dropdown');
//     $('select').each(function() { //.each(function(index)){} iterate each of ul item

//         // console.log('main');

//         var $this = $(this),
//             numberOfOptions = $(this).children('option').length; //$this = $('select') tag

//         $this.addClass('select-hidden');
//         $this.wrap('<div class="select"></div>');
//         $this.after('<div class="select-styled"></div>');

//         var $styledSelect = $this.next('div.select-styled'); //select tag . next div that contains class select-style
//         // $styledSelect.text($this.children('option').eq(0).text()); // this display the default text of dropdown or selected
//         //     // dropdown.text = select.option.index(0).text

//         for (var k = 0; k < numberOfOptions; k++) {
//             if ($this.val() == $this.children('option').eq(k).val()) {
//                 $styledSelect.text($this.children('option').eq(k).text())
//             }
//         }

//         var $list = $('<ul />', {
//             'class': 'select-options'
//         }).insertAfter($styledSelect);

//         for (var i = 0; i < numberOfOptions; i++) {
//             $('<li />', {
//                 text: $this.children('option').eq(i).text(),
//                 rel: $this.children('option').eq(i).val()
//             }).appendTo($list);
//         }

//         //event respond
//         var $listItems = $list.children('li');

//         $styledSelect.click(function(e) { // when dropdown was clicked toggle class active 
//             e.stopPropagation(); //prevent clicking multiple times
//             $('div.select-styled.active').not(this).each(function() {
//                 $(this).removeClass('active').next('ul.select-options').hide();
//             });
//             $(this).toggleClass('active').next('ul.select-options').toggle();
//         });

//         $listItems.click(function(e) { // when clicked on li
//             e.stopPropagation();
//             $styledSelect.text($(this).text()).removeClass('active');
//             $this.val($(this).attr('rel')); // select.name.value = listitems.relation
//             $list.hide();
//             //console.log($this.val());
//         });

//         $(document).click(function() { // when window outside the dropdown was clicked
//             $styledSelect.removeClass('active');
//             $list.hide(); // hide items
//         });

//     });
// }