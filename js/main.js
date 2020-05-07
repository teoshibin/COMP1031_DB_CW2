const inputs = document.querySelectorAll('.input');


//line animation
function focusFunc() {
    let parent = this.parentNode.parentNode;
    parent.classList.add('focus');
}

function blurFunc() {
    let parent = this.parentNode.parentNode;
    if (this.value == "") {
        parent.classList.remove('focus');
    }
}
inputs.forEach(input => {
    input.addEventListener('focus', focusFunc);
    input.addEventListener('blur', blurFunc);
});


//intro animation
$(window).on("load", function () {
    $(".loader-wrapper").fadeOut("slow");
});

//file upload js
try {
    ////file upload js
    document.querySelector("html").classList.add('js');

    var fileInput = document.querySelector(".input-file"),
        button = document.querySelector(".input-file-trigger"),
        the_return = document.querySelector(".file-return");

    button.addEventListener("keydown", function (event) {
        if (event.keyCode == 13 || event.keyCode == 32) {
            fileInput.focus();
        }
    });
    button.addEventListener("click", function (event) {
        fileInput.focus();
        return false;
    });
    fileInput.addEventListener("change", function (event) {
        the_return.innerHTML = this.value;
    });
} catch (error) {
    console.log(error);
}

//// dropdown css
//generate html
// function replaceDropdown(){
    $('select').each(function () { //.each(function(index)){} iterate each of ul item

        console.log('main');

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

        $styledSelect.click(function (e) { // when dropdown was clicked toggle class active 
            e.stopPropagation(); //prevent clicking multiple times
            $('div.select-styled.active').not(this).each(function () {
                $(this).removeClass('active').next('ul.select-options').hide();
            });
            $(this).toggleClass('active').next('ul.select-options').toggle();
        });

        $listItems.click(function (e) { // when clicked on li
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel')); // select.name.value = listitems.relation
            $list.hide();
            //console.log($this.val());
        });

        $(document).click(function () { // when window outside the dropdown was clicked
            $styledSelect.removeClass('active');
            $list.hide(); // hide items
        });

    });
// } 

