'use strict'

var stickyElement = document.querySelector('.sticky'),
    stickyClass = "sticky-pin",
    stickyPos = 1, //Distance from the top of the window.
    stickyHeight;

//Sticker function:
function stickerFn() {

    var winTop = window.pageYOffset || document.documentElement.scrollTop;
    //Check element position:

    winTop >= stickyPos ?
    stickyElement.classList.add(stickyClass) :
    stickyElement.classList.remove(stickyClass);
};
stickerFn(); //Run.

//Function trigger:
window.addEventListener('scroll',()=>{
    stickerFn();
})


//Header Sticky in max-width 

// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("stickyHeader");

// Get the offset position of the navbar
var headerSticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > headerSticky) {
    header.classList.add("sticky-header");
  } else {
    header.classList.remove("sticky-header");
  }
}
