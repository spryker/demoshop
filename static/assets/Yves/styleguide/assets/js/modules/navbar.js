import $ from 'jquery';
import { debounce } from './helpers';

'use strict';

$(document).ready(function () {

    $('.navbar').each(function () {
        var $navbar, $navbarTop, $menu, $marker, $trigger, $offcanvas;

        $navbar = $(this);
        $navbarTop = $navbar.find('.navbar__top');
        $marker = $navbar.find('.navbar__marker');
        $trigger = $('.navbar__link');
        $offcanvas = $('.offcanvas');
        $navbarTop = $('.navbar__top');

        updateMarker();


        $(window).resize(debounce(250, updateMarker));

        $(document).on('NAVSTATE_CHANGE', updateMarker);

        $('.navbar__link--more').click(function () {
            // TODO: messages into module const
            $(document).trigger('OFFCANVAS_SHOW');
        });

        $(window).scroll(checkTopBar);


        function updateMarker () {
            var $active, width, left;

            $active = $('.navbar__link--open').size() ? $('.navbar__link--open').children().eq(0) : $('.navbar__link--active').children().eq(0);

            width = $active.outerWidth();
            left = $active.offset().left;

            $marker.css({
                left: left + 'px',
                width: width + 'px',
                opacity: 1
            });
        }

        function checkTopBar () {
            var top = $(window).scrollTop();

            if (top > 50) {
                $navbarTop.addClass('navbar__top--hidden');

            } else {
                $navbarTop.removeClass('navbar__top--hidden');
            }
        }
    });

});