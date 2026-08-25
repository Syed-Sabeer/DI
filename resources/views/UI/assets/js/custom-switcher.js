"use strict";

let mainContent;
(function () {

    let html = document.querySelector('html');

    //RTL
    if (!localStorage.getItem("Aexorartl")) {
        // html.setAttribute("dir" , "rtl") // for rtl version
    }

    //Light Theme Style
    if (!localStorage.getItem("Aexoralighttheme")) {
        // html.setAttribute("data-theme-mode" , "light") // for light theme
    }

    //Dark Theme Style
    if (!localStorage.getItem("Aexoradarktheme")) {
        // html.setAttribute("data-theme-mode" , "dark") // for dark theme
    }

    //Boxed styles
    if (!localStorage.getItem("Aexoraboxed")) {
        // html.setAttribute("data-width" , "boxed") // for boxed style
    }

    /*RTL Start*/
    if (html.getAttribute('dir') === "rtl") {
        rtlFn();
    }
    /*RTL End*/

    if (document.querySelector("#switcher-canvas")) {
        localStorageBackup();
    }

    switcherClick();
    checkOptions();

})();

function switcherClick() {
    let ltrBtn, rtlBtn, lightBtn, darkBtn, boxedBtn, fullwidthBtn,  resetBtn,loaderEnable,loaderDisable,
    primaryDefaultColor1Btn, primaryDefaultColor2Btn, primaryDefaultColor3Btn, primaryDefaultColor4Btn, primaryDefaultColor5Btn,
    bgDefaultColor1Btn, bgDefaultColor2Btn, bgDefaultColor3Btn, bgDefaultColor4Btn, bgDefaultColor5Btn,  ResetAll;
    let html = document.querySelector('html');
    lightBtn = document.querySelector('#switcher-light-theme');
    darkBtn = document.querySelector('#switcher-dark-theme');
    ltrBtn = document.querySelector('#switcher-ltr');
    rtlBtn = document.querySelector('#switcher-rtl');
    boxedBtn = document.querySelector('#switcher-boxed');
    fullwidthBtn = document.querySelector('#switcher-full-width');
    resetBtn = document.querySelector('#resetbtn');
    primaryDefaultColor1Btn = document.querySelector('#switcher-primary');
    primaryDefaultColor2Btn = document.querySelector('#switcher-primary1');
    primaryDefaultColor3Btn = document.querySelector('#switcher-primary2');
    primaryDefaultColor4Btn = document.querySelector('#switcher-primary3');
    primaryDefaultColor5Btn = document.querySelector('#switcher-primary4');
    bgDefaultColor1Btn = document.querySelector('#switcher-background');
    bgDefaultColor2Btn = document.querySelector('#switcher-background1');
    bgDefaultColor3Btn = document.querySelector('#switcher-background2');
    bgDefaultColor4Btn = document.querySelector('#switcher-background3');
    bgDefaultColor5Btn = document.querySelector('#switcher-background4');
    ResetAll = document.querySelector('#reset-all');
    loaderEnable = document.querySelector('#switcher-loader-enable');
    loaderDisable = document.querySelector('#switcher-loader-disable');


    // primary theme
    if(primaryDefaultColor1Btn){
        primaryDefaultColor1Btn.addEventListener('click', () => {
            localStorage.setItem("primaryRGB", "88, 102, 238");
            html.style.setProperty('--primary-rgb', `88, 102, 238`);
            updateColors();
        })
    }
    if(primaryDefaultColor2Btn){
        primaryDefaultColor2Btn.addEventListener('click', () => {
            localStorage.setItem("primaryRGB", "160, 58, 194");
            html.style.setProperty('--primary-rgb', `160, 58, 194`);
            updateColors();
        })
    }
    if(primaryDefaultColor3Btn){
        primaryDefaultColor3Btn.addEventListener('click', () => {
            localStorage.setItem("primaryRGB", "59, 145, 73");
            html.style.setProperty('--primary-rgb', `59, 145, 73`);
            updateColors();
        })
    }
    if(primaryDefaultColor4Btn){
        primaryDefaultColor4Btn.addEventListener('click', () => {
            localStorage.setItem("primaryRGB", "46, 126, 255");
            html.style.setProperty('--primary-rgb', `46, 126, 255`);
            updateColors();
        })
    }
    if(primaryDefaultColor5Btn){
        primaryDefaultColor5Btn.addEventListener('click', () => {
            localStorage.setItem("primaryRGB", "51, 170, 169");
            html.style.setProperty('--primary-rgb', `51, 170, 169`);
            updateColors();
        })
    }

    // Background theme
    if(bgDefaultColor1Btn){
        bgDefaultColor1Btn.addEventListener('click', () => {
           localStorage.setItem('bodyBgRGB', "21, 1, 123");
           html.setAttribute('data-theme-mode', 'dark');
           document.querySelector('html').style.setProperty('--body-bg-rgb', localStorage.bodyBgRGB);
           document.querySelector('#switcher-dark-theme').checked = true;
       })
    }
    if(bgDefaultColor2Btn){
        bgDefaultColor2Btn.addEventListener('click', () => {
           localStorage.setItem('bodyBgRGB', "77, 4, 139");
           html.setAttribute('data-theme-mode', 'dark');
           document.querySelector('html').style.setProperty('--body-bg-rgb', localStorage.bodyBgRGB);
           document.querySelector('#switcher-dark-theme').checked = true;
       })
    }
    if(bgDefaultColor3Btn){
        bgDefaultColor3Btn.addEventListener('click', () => {
           localStorage.setItem('bodyBgRGB', "39, 60, 42");
           html.setAttribute('data-theme-mode', 'dark');
           document.querySelector('html').style.setProperty('--body-bg-rgb', localStorage.bodyBgRGB);
           document.querySelector('#switcher-dark-theme').checked = true;
       })
    }
    if(bgDefaultColor4Btn){
        bgDefaultColor4Btn.addEventListener('click', () => {
           localStorage.setItem('bodyBgRGB', "12, 73, 170");
           html.setAttribute('data-theme-mode', 'dark');
           document.querySelector('html').style.setProperty('--body-bg-rgb', localStorage.bodyBgRGB);
           document.querySelector('#switcher-dark-theme').checked = true;
       })
    }
    if(bgDefaultColor5Btn){
        bgDefaultColor5Btn.addEventListener('click', () => {
           localStorage.setItem('bodyBgRGB', "2, 109, 150");
           html.setAttribute('data-theme-mode', 'dark');
           document.querySelector('html').style.setProperty('--body-bg-rgb', localStorage.bodyBgRGB);
           document.querySelector('#switcher-dark-theme').checked = true;
       })
    }

    /* Light Layout Start */
    if(lightBtn){
        lightBtn.addEventListener('click', () => {
            lightFn();
        })
    }
    /* Light Layout End */

    /* Dark Layout Start */
    if(darkBtn){
        darkBtn.addEventListener('click', () => {
            darkFn();
        });
    }
    /* Dark Layout End */

    /* rtl start */
    if(rtlBtn){
        rtlBtn.addEventListener('click', () => {
            localStorage.setItem("Aexorartl", true);
            localStorage.removeItem("Aexoraltr");
            rtlFn();
        });
        /* rtl end */
    }

    /* ltr start */
    if(ltrBtn){
        ltrBtn.addEventListener('click', () => {
            //    local storage
            localStorage.setItem("Aexoraltr", true);
            localStorage.removeItem("Aexorartl");
            ltrFn();
        });
    }
    /* ltr end */

    /* Full Width Layout Start */
    if(fullwidthBtn){
        fullwidthBtn.addEventListener('click', () => {
           html.setAttribute('data-width', 'fullwidth');
           localStorage.setItem("Aexorafullwidth", true);
           localStorage.removeItem("Aexoraboxed");
       });
    }
    /* Full Width Layout End */

    /* Boxed Layout Start */
    if(boxedBtn){
        boxedBtn.addEventListener('click', () => {
           html.setAttribute('data-width', 'boxed');
           localStorage.setItem("Aexoraboxed", true);
           localStorage.removeItem("Aexorafullwidth");
        })
    };
    /* Boxed Layout End */

    // reset all start
    if(ResetAll){
        ResetAll.addEventListener('click', () => {
            ResetAllFn();
        })
    }
    // reset all start

      /* loader start */
      loaderEnable.onclick = ()=>{
        document.querySelector("html").setAttribute("data-loader","enable");
        localStorage.setItem("loaderEnable","true")
    }
    
    loaderDisable.onclick = ()=>{
        document.querySelector("html").setAttribute("data-loader","disable");
        localStorage.setItem("loaderEnable","false")
    }
    /* loader end */
}

function ltrFn() {
    let html = document.querySelector('html')
    document.querySelector("#style")?.setAttribute("href", "../assets/libs/bootstrap/css/bootstrap.min.css");
    html.setAttribute("dir", "ltr");
    document.querySelector('#switcher-ltr').checked = true;
    checkOptions();
}

function rtlFn() {
    let html = document.querySelector('html');
    html.setAttribute("dir", "rtl");
    document.querySelector("#style")?.setAttribute("href", "../assets/libs/bootstrap/css/bootstrap.rtl.min.css");
    checkOptions();
}

function lightFn() {
    let html = document.querySelector('html');
    html.setAttribute('data-theme-mode', 'light');
    if(document.querySelector('#switcher-light-theme')){
        document.querySelector('#switcher-light-theme').checked = true;
    }
    updateColors() 
    localStorage.removeItem("Aexoradarktheme");
    localStorage.removeItem("AexorabgColor");
    localStorage.removeItem("Aexorabgwhite");
    localStorage.removeItem("bodyBgRGB");
    checkOptions();
    html.style.removeProperty('--body-bg-rgb');
}

function darkFn() {
    let html = document.querySelector('html');
    html.setAttribute('data-theme-mode', 'dark');
    updateColors()
    localStorage.setItem("Aexoradarktheme", true);
    localStorage.removeItem("Aexoralighttheme");
    localStorage.removeItem("bodyBgRGB");
    localStorage.removeItem("AexorabgColor");
    localStorage.removeItem("Aexorabgwhite");
    checkOptions();
}
function ResetAllFn() {
    let html = document.querySelector('html');
    checkOptions();

    // clearing localstorage
    localStorage.clear();

    // reseting to light
    lightFn();

    // clearing attibutes
    html.removeAttribute('data-width');

    // clear primary & bg color
    html.style.removeProperty(`--primary-rgb`);
    html.style.removeProperty(`--body-bg-rgb`);

    // reseting to ltr
    ltrFn();

    // reseting layout width styles
    if(document.querySelector('#switcher-full-width')){
        document.querySelector('#switcher-full-width').checked = true;
    }

    if(document.querySelector('#switcher-boxed')){
        document.querySelector('#switcher-boxed').checked = false;
    }

    // reseting chart colors
    updateColors();

}

function checkOptions() {

    // dark
    if (localStorage.getItem('Aexoradarktheme')) {
        if(document.querySelector('#switcher-dark-theme')){
            document.querySelector('#switcher-dark-theme').checked = true;
        }
    }

    //RTL
    if (localStorage.getItem('Aexorartl')) {
        if(document.querySelector('#switcher-rtl')){
            document.querySelector('#switcher-rtl').checked = true;
        }
    }

    //boxed
    if (localStorage.getItem('Aexoraboxed')) {
        if(document.querySelector('#switcher-boxed')){
            document.querySelector('#switcher-boxed').checked = true;
        }
    }

    // loader
    if(localStorage.loaderEnable != "true"){
        document.querySelector("#switcher-loader-disable").checked = true
    }
}

if(localStorage.loaderEnable == 'true'){
    document.querySelector("html").setAttribute("data-loader","enable");
}else{
    if(!document.querySelector("html").getAttribute("data-loader")){
        document.querySelector("html").setAttribute("data-loader","disable");
    }
}

// chart colors
let myVarVal,primaryRGB
function updateColors() {
    'use strict'
    primaryRGB = getComputedStyle(document.documentElement).getPropertyValue('--primary-rgb').trim();

    //get variable
    myVarVal = localStorage.getItem("primaryRGB") || primaryRGB;
}
updateColors()

function localStorageBackup() {
    // if there is a value stored, update color picker and background color
    // Used to retrive the data from local storage
    if (localStorage.primaryRGB) {
        if (document.querySelector('.theme-container-primary')) {
            document.querySelector('.theme-container-primary').value = localStorage.primaryRGB;
        }
        document.querySelector('html').style.setProperty('--primary-rgb', localStorage.primaryRGB);
    }
    if (localStorage.bodyBgRGB) {
        if (document.querySelector('.theme-container-background')) {
            document.querySelector('.theme-container-background').value = localStorage.bodyBgRGB;
        }
        document.querySelector('html').style.setProperty('--body-bg-rgb', localStorage.bodyBgRGB);
        let html = document.querySelector('html');
        html.setAttribute('data-theme-mode', 'dark');
        document.querySelector('#switcher-dark-theme').checked = true;
    }
    if (localStorage.Aexoradarktheme) {
        let html = document.querySelector('html');
        html.setAttribute('data-theme-mode', 'dark');
    }
    if (localStorage.Aexorartl) {
        let html = document.querySelector('html');
        html.setAttribute('dir', 'rtl');
        rtlFn();
    }
    if (localStorage.Aexoraboxed) {
        let html = document.querySelector('html');
        html.setAttribute('data-width', 'boxed');
    }
    if(localStorage.Aexoraltr){
        ltrFn()
    }

    if(localStorage.loaderEnable == "true"){
        document.querySelector("#switcher-loader-enable").checked = true
    }
}