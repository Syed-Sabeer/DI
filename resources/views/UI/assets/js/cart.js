(function () {
    'use strict';


    // Cart quantity settings
    const minValue = 0;
    const maxValue = 30;

    const productMinusBtn = document.querySelectorAll(".product-quantity-minus");
    const productPlusBtn = document.querySelectorAll(".product-quantity-plus");

    productMinusBtn.forEach((button) => {
    button.onclick = () => {
        const input = button.parentElement.querySelector("input");
        let value = Number(input.value);
        if (value > minValue) {
        value -= 1;
        input.value = value;
        }
    };
    });

    productPlusBtn.forEach((button) => {
    button.onclick = () => {
        const input = button.parentElement.querySelector("input");
        let value = Number(input.value);
        if (value < maxValue) {
        value += 1;
        input.value = value;
        }
    };
    });
// Cart quantity settings


})();