import $ from 'jquery';
import { debounce } from './helpers';
import { ToastService } from './toast';

'use strict';


$(document).ready(function () {

    $('.menu').each(function () {
        var $menu, $close, $trigger, height, closed;

        $menu = $(this);
        $close = $menu.find('.close-button');
        $trigger = $('.navbar__link[data-menu="main"]');

        updateHeight();

        hideMenu();


        $close.click(hideMenu);

        $trigger.click(function (e) {
            e.preventDefault();
            showMenu();

            $trigger.removeClass('navbar__link--open');
            $(this).addClass('navbar__link--open');

            $(document).trigger('NAVSTATE_CHANGE');
        });

        $('.navbar__link--login').click(function (e) {
            e.preventDefault();

            var toast = new ToastService();
            toast.show({
                message: 'Login layer'
            });
        });

        $(window).resize(debounce(250, function () {
            updateHeight();

            if (closed) {
                hideMenu(true);

            } else {
                showMenu(true);
            }
        }));


        function hideMenu (disableTransition) {
            if (typeof disableTransition === 'boolean' && disableTransition) {
                $menu.removeClass('js-processed');
            }

            closed = true;
            $menu.css({
                'margin-top': -height
            });

            setTimeout(function () {
                $menu.addClass('js-processed');
            });

            $trigger.removeClass('navbar__link--open');
            $(document).trigger('NAVSTATE_CHANGE');
        }

        function showMenu (disableTransition) {
            if (typeof disableTransition === 'boolean' && disableTransition) {
                $menu.removeClass('js-processed');
            }

            closed = false;
            $menu.css({
                'margin-top': 0
            });

            setTimeout(function () {
                $menu.addClass('js-processed');
            });

            $('html, body').animate({
                scrollTop: 0
            }, $(window).scrollTop);
        }

        function updateHeight () {
            height = $menu.height();
        }
    });

});