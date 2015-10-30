import $ from 'jquery';
import { debounce } from './helpers';

'use strict';

$(document).ready(function () {

    $('.navbar').each(function () {
        var $navbar, $menu, $marker, $trigger;

        $navbar = $(this);
        $marker = $navbar.find('.navbar__marker');
        $trigger = $('.navbar__link');

        updateMarker();


        $(window).resize(debounce(250, updateMarker));

        $(document).on('NAVSTATE_CHANGE', updateMarker);

        $('.navbar__link--more').click(function () {
            $('body').toggleClass('offcanvas-open');
        });


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
    });

});