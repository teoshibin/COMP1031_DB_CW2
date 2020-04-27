const inputs = document.querySelectorAll('.input');


//line animation
function focusFunc(){
    let parent = this.parentNode.parentNode;
    parent.classList.add('focus');
}
function blurFunc(){
    let parent = this.parentNode.parentNode;
    if(this.value == ""){
        parent.classList.remove('focus');
    }
}
inputs.forEach(input => {
    input.addEventListener('focus', focusFunc);
    input.addEventListener('blur', blurFunc);
});


//intro animation
$(window).on("load",function(){
    $(".loader-wrapper").fadeOut("slow");
});