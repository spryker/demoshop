import $ from 'jquery';
import throttle from 'lodash/function/throttle';
import { EVENTS as OFFCANVAS_EVENTS } from './offcanvas';

'use strict';



const EVENTS = {
    NAVSTATE_CHANGE: 'NAVSTATE_CHANGE'
};


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


        $(window).resize(throttle(updateMarker, 250));

        $(document).on(EVENTS.NAVSTATE_CHANGE, updateMarker);

        $('.navbar__link--more').click(function () {
            $(document).trigger(OFFCANVAS_EVENTS.OFFCANVAS_SHOW);
        });

        $(window).scroll(checkTopBar);


        function updateMarker () {
            var $active, width, left;

            $active = $('.navbar__link--open').size() ? $('.navbar__link--open').children().eq(0) : $('.navbar__link--active').children().eq(0);

            width = $active.size() ? $active.outerWidth() : 50;
            left = $active.size() ? $active.offset().left : $('.navbar__logo:visible').size() ? $('.navbar__logo').offset().left + 10 : -50;

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


export { EVENTS };