"use strict";

/* ------------- Preloader Js ------------- */
window.addEventListener("load", function () {
  const loader = document.querySelector(".page-loader");
  loader.classList.add("d-none")

  if (loader) {
    loader.style.transition = "opacity 0.6s ease";
    loader.style.opacity = "0";

    setTimeout(function () {
      loader.style.display = "none";
    }, 600);
  }
});
/* ------------- Preloader Js ------------- */


/* .. tooltip .. */
const tooltipTriggerList = document.querySelectorAll(
  '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
  (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);

/* .. popover .. */
const popoverTriggerList = document.querySelectorAll(
  '[data-bs-toggle="popover"]'
);
const popoverList = [...popoverTriggerList].map(
  (popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl)
);

/* Start::back-to-top */
function backToTop() {
  var back_to_top = document.querySelector(".back-to-top");
  var windowTop = window.pageYOffset || document.documentElement.scrollTop;
  windowTop > 500
    ? (back_to_top.style.display = "inline-flex")
    : (back_to_top.style.display = "none");
}
window.addEventListener("scroll", backToTop);

function backToTopController() {
  const backToTopBtn = document.querySelector("#back-to-top");

  if (!backToTopBtn) return;

  const updateScrollProgress = () => {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight =
      document.documentElement.scrollHeight - document.documentElement.clientHeight;

    const scrollValue = scrollHeight > 0
      ? Math.round((scrollTop / scrollHeight) * 100)
      : 0;

    // Circular progress background
    backToTopBtn.style.background = `conic-gradient(rgba(var(--primary-rgb)) ${scrollValue}%, var(--custom-white) ${scrollValue}%)`;

    // Show / hide button
    if (scrollTop > 100) {
      backToTopBtn.classList.add("active");
    } else {
      backToTopBtn.classList.remove("active");
    }
  };

  window.addEventListener("scroll", updateScrollProgress);
  window.addEventListener("load", updateScrollProgress);

  backToTopBtn.addEventListener("click", function (e) {
    e.preventDefault(); // prevent #top jump
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
}

backToTopController();
/* End::back-to-top */

// reveal items on scroll
function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  if (reveals) {
    for (var i = 0; i < reveals.length; i++) {
      var windowHeight = window.innerHeight;
      var cardTop = reveals[i].getBoundingClientRect().top;
      var cardRevealPoint = 130;
      if (cardTop < windowHeight - cardRevealPoint) {
        reveals[i].classList.add("reveal-active");
      } else {
        reveals[i].classList.remove("reveal-active");
      }
    }
  }
}
window.addEventListener("scroll", reveal);
reveal(); //Run

var coverImg = document.querySelectorAll(".cover-image");

coverImg.forEach((ele) => {
  var attr = ele.getAttribute("data-bs-image-src");
  if (attr && typeof attr !== typeof undefined && attr !== false) {
    ele.style.background = `url(${attr}) center center`;
  }
});

/* Choices JS */
document.addEventListener("DOMContentLoaded", function () {
  var genericExamples = document.querySelectorAll("[data-trigger]");
  for (let i = 0; i < genericExamples.length; ++i) {
    var element = genericExamples[i];
    new Choices(element, {
      allowHTML: true,
      placeholderValue: "This is a placeholder set in the config",
      searchPlaceholderValue: "Search",
    });
  }
});
/* Choices JS */

/* header theme toggle */
// function toggleTheme() {
//   let html = document.querySelector("html");
//   if (html.getAttribute("data-theme-mode") === "dark") {
//     html.setAttribute("data-theme-mode", "light");
//     html.removeAttribute("data-bg-theme");
//     if (!localStorage.getItem("primaryRGB")) {
//       html.setAttribute("style", "");
//     }
//     html.removeAttribute("data-bg-theme");
//     document.querySelector("#switcher-light-theme").checked = true;
//     document
//       .querySelector("html")
//       .style.removeProperty("--body-bg-rgb", localStorage.bodyBgRGB);
//     checkOptions();
//     document.querySelector("#switcher-light-theme").checked = true;
//     document.querySelector("#switcher-background4").checked = false;
//     document.querySelector("#switcher-background3").checked = false;
//     document.querySelector("#switcher-background2").checked = false;
//     document.querySelector("#switcher-background1").checked = false;
//     document.querySelector("#switcher-background").checked = false;
//     localStorage.removeItem("Aexoradarktheme");
//     localStorage.removeItem("bodylightRGB");
//     localStorage.removeItem("bodyBgRGB");
//     if (localStorage.getItem("aexoralayout") != "horizontal") {
//       html.setAttribute("data-menu-styles", "dark");
//     }
//     html.setAttribute("data-header-styles", "light");
//   } else {
//     html.setAttribute("data-theme-mode", "dark");  
//      if (!localStorage.getItem("primaryRGB")) {
//       html.setAttribute("style", "");
//     }
//     document.querySelector("#switcher-dark-theme").checked = true;
//     checkOptions();
//     document.querySelector("#switcher-dark-theme").checked = true;
//     document.querySelector("#switcher-background4").checked = false;
//     document.querySelector("#switcher-background3").checked = false;
//     document.querySelector("#switcher-background2").checked = false;
//     document.querySelector("#switcher-background1").checked = false;
//     document.querySelector("#switcher-background").checked = false;
//     localStorage.setItem("Aexoradarktheme", "true");
//     localStorage.removeItem("bodylightRGB");
//     localStorage.removeItem("bodyBgRGB");
//   }
// }
// let layoutSetting = document.querySelector(".layout-setting");
// layoutSetting.addEventListener("click", toggleTheme);
/* header theme toggle */
