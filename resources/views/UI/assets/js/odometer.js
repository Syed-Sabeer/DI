(function () {
    "use strict";


   // Callback function for WOW.js
   function odometerController() {
    console.log("WOW.js animation triggered");
    }

    // WOW.js initialization
    function wowController() {
        if (document.querySelectorAll(".wow").length > 0) {
            new WOW({ callback: odometerController }).init();
        }
    }

    // Call the wowController function to initialize WOW.js
    wowController();

    // Odometer JS (Vanilla)
    function odometerController() {
        const odometers = document.querySelectorAll(".odometer");
        if (!odometers.length) return;
    
        const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const numCount = el.getAttribute("data-count");
                el.textContent = numCount;
    
                // Run only once per element
                obs.unobserve(el);
            }
            });
        },
        {
            threshold: 0.2 // trigger when 20% visible
        }
        );
    
        odometers.forEach((el) => observer.observe(el));
    }
    document.addEventListener("DOMContentLoaded", function () {
        odometerController();
    });


})();