
// When the user scrolls down 50px from the top of the document, resize the header's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    document.querySelectorAll(".page-header-tweak h1")[0].style.fontSize = '6rem';
  } else {
    document.querySelectorAll(".page-header-tweak h1")[0].style.fontSize = "8rem";
  }
}