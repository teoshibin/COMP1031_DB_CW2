
// When the user scrolls down 50px from the top of the document, resize the header's font size
var scroll_state = true;
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 110 || document.documentElement.scrollTop > 110) {
    document.querySelectorAll(".my-header-text h3")[0].style.fontSize = '4rem';
    document.querySelectorAll(".my-header-text small")[0].style.fontSize = '2rem';
  } else {
    document.querySelectorAll(".my-header-text h3")[0].style.fontSize = "5rem";
    document.querySelectorAll(".my-header-text small")[0].style.fontSize = "3rem";
  }
  
}