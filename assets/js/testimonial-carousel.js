(function ($, elementor) {

    'use strict';

    var widgetReviewCardCarousel = function ($scope, $) {

        var $reviewCardCarousel = $scope.find('.ek-testimonial-slider-area');
        if (!$reviewCardCarousel.length) {
            return;
        }

        var $reviewCardCarouselContainer = $reviewCardCarousel.find('.swiper-carousel'),
            $settings = $reviewCardCarousel.data('settings');

        const Swiper = elementorFrontend.utils.swiper;
        initSwiper();

        async function initSwiper() {
            var swiper = await new Swiper($reviewCardCarouselContainer, $settings); // this is an example

            if ($settings.pauseOnHover) {
                $($reviewCardCarouselContainer).hover(function () {
                    (this).swiper.autoplay.stop();
                }, function () {
                    (this).swiper.autoplay.start();
                });
            }

        };
    };


    jQuery(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/elite_kit_testimonial_carousel.default', widgetReviewCardCarousel);
    });


}(jQuery, window.elementorFrontend));
