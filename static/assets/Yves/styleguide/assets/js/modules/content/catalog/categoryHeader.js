import $ from 'jquery';
import throttle from 'lodash/function/throttle';

'use strict';



$(document).ready(function () {

    $('.category-header').each(function () {
        var $header, $headerCategories, $navbar, dimensions, $successor;

        $header = $(this);
        $headerCategories = $header.find('.category-header__categories');
        $navbar = $('.navbar');
        $successor = $('.product-grid');

        updateDimensions();
        $(window).resize(throttle(updateDimensions, 200));

        $(window).scroll(checkTopBar);


        function checkTopBar () {
            var top = $(window).scrollTop();

            if (top + $navbar.outerHeight() > dimensions.offset + dimensions.height - $headerCategories.outerHeight()) {
                fixedHeader();

            } else {
                staticHeader();
            }
        }

        // TODO: dynamic value
        function fixedHeader () {
            if (!$header.hasClass('js-fixed')) {
                $header.addClass('js-fixed');

                $header.css({
                    'position': 'fixed',
                    'top': '-100%',
                    'z-index': 1,
                    'margin-top': 282
                });

                $successor.css({
                    'padding-top': 545
                });
            }
        }

        function staticHeader () {
            if ($header.hasClass('js-fixed')) {
                $header.removeClass('js-fixed');

                $header.css({
                    'position': 'static',
                    'margin-top': 0
                });

                $successor.css({
                    'padding-top': 0
                });
            }
        }

        function updateDimensions () {
            dimensions = {
                offset: $header.offset().top,
                height: $header.outerHeight()
            };

            staticHeader();

            checkTopBar();
        }
    });

});
