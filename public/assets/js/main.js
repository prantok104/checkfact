(function(jQuery) {
    "use strict";
    jQuery(document).ready(function() {

        /****************************************
              -------*** JS Table ***-------
                    ----------------
        *****************************************/


        /************************************************
            01. SEARCH AREA JS
        *************************************************/

        jQuery('.search-form-open').on('click', function() {

            jQuery('.fact-search-area-start').toggleClass('open-search');

        });

        jQuery('.fact-search-close').on('click', function() {
            jQuery('.fact-search-area-start').removeClass('open-search');
        });



        /************************************************
            02. MAIN SLIDER JS
        *************************************************/
        jQuery('.fact-main-slider').owlCarousel({
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            loop: true,
            margin: 0,
            autoplay: true,
            autoplayHoverPause: true,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });

        /************************************************
            03. CATEGORY SLIDER JS
        *************************************************/
        jQuery('.fact-category-slidera-area').owlCarousel({
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            loop: true,
            margin: 30,
            autoplay: true,
            autoplaySpeed: 2000,
            nav: true,
            navText: ['<i class="fal fa-angle-left"></i>', '<i class="fal fa-angle-right"></i>'],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1200: {
                    items: 3
                },
                1500: {
                    items: 3
                }
            }
        });

        /************************************************
            04. SOCIAL SLIDER JS
        *************************************************/
        jQuery('.social-share-slider').owlCarousel({
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            loop: true,
            margin: 30,
            autoplay: false,
            autoplaySpeed: 2000,
            nav: true,
            navText: ['<i class="fal fa-angle-left"></i>', '<i class="fal fa-angle-right"></i>'],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1200: {
                    items: 4
                },
                1500: {
                    items: 4
                }
            }
        });

        /************************************************
         05. Mobile Menu JS
         *************************************************/
        jQuery('#primary-menu').slicknav({
            prependTo: '.responsive-mobile-menu'
        });

    });
}(jQuery));