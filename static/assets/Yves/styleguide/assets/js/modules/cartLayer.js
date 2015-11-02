import $ from 'jquery';
import { debounce } from './helpers';

'use strict';


// TODO: abstract menu & cart layer
$(document).ready(function () {

    $('.cart-layer').each(function () {
        var $menu, $close, $trigger, height, closed;

        $menu = $(this);
        $close = $menu.find('.close-button');
        $trigger = $('.navbar__link[data-menu="cart"]');

        updateHeight();
        hideMenu();

        $menu.find('img').one('load', function() {
            updateHeight();
            hideMenu(true);

        }).each(function() {
          if(this.complete) $(this).load();
        });

        $close.click(hideMenu);

        $trigger.click(function (e) {
            e.preventDefault();
            showMenu();

            $trigger.removeClass('navbar__link--open');
            $(this).addClass('navbar__link--open');

            $(document).trigger('NAVSTATE_CHANGE');
        });

        $menu.click(function (e) {
            var $target = $(e.target);

            if (!$target.parents('.cart-layer__inner').size() && !$target.hasClass('cart-layer__inner')) {
                hideMenu();
            }
        });

        function hideMenu (disableTransition) {
            if (typeof disableTransition === 'boolean' && disableTransition) {
                $menu.removeClass('js-processed');
            }

            closed = true;
            $menu.css({
                'margin-top': - (height + 30)
            });
            $menu.removeClass('cart-layer--open');

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
            $menu.addClass('cart-layer--open');

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