(function ($, elementor) {

    'use strict';

    var teamSocialBtn = function ($scope, $) {
        var socialButton = document.querySelector('.social-button');
        var activeClass = document.querySelector('.ek-team-area-2 .social-item');
        if (socialButton && activeClass) {
            socialButton.onclick = function (e) {
                e.preventDefault();
                activeClass.classList.toggle('active');
            }
        }
    };

    jQuery(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/elite_kit_team.default', teamSocialBtn);
    });

}(jQuery, window.elementorFrontend));