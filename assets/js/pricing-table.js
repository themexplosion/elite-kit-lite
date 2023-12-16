(function ($, elementor) {

    'use strict';


    var pricingToggle = function ($scope, $) {

        const checkbox = document.getElementById('priceChange');
        const primaryList = document.getElementById('primaryList');
        const secondaryList = document.getElementById('secondaryList');
        // const otherList = document.getElementById('otherList');
        const periodOne = document.querySelector('.period-one');
        const periodTwo = document.querySelector('.period-two');

        if (checkbox && primaryList && secondaryList && periodOne && periodTwo) {
            secondaryList.style.display = 'none';
            periodOne.classList.add('active');
            checkbox.addEventListener('change', function () {
                if (checkbox.checked) {
                    primaryList.style.display = 'none';
                    secondaryList.style.display = 'block';
                    periodOne.classList.remove('active');
                    periodTwo.classList.add('active');
                } else {
                    primaryList.style.display = 'block';
                    secondaryList.style.display = 'none';
                    periodOne.classList.add('active');
                    periodTwo.classList.remove('active');
                }
            });
        }

    };

    jQuery(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/elite_kit_pricing_table_advance.default', pricingToggle);
    });


    var pricingToggleTwo = function ($scope, $) {

        var toggleLists = document.querySelectorAll('.ek-price-toggle-5 .period');
        var pricingList = document.querySelectorAll('.ek-price-list');
        if (toggleLists && pricingList) {
            pricingList[1].style.display = 'none';
            pricingList[2].style.display = 'none';
            toggleLists[0].classList.add('active');
            toggleLists.forEach(function (menuItem, index) {
                menuItem.addEventListener('click', function () {

                    toggleLists.forEach(function (item) {
                        item.classList.remove('active');
                    });

                    pricingList.forEach(function (contentDiv) {
                        contentDiv.style.display = 'none';
                    });

                    pricingList[index].style.display = 'block';
                    menuItem.classList.add('active');
                });
            });
        }
    };

    jQuery(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/elite_kit_pricing_table_advance.default', pricingToggleTwo);
    });
}(jQuery, window.elementorFrontend));

